<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Mail\facturaMail;

use App\Trabajo;
use App\Factura;
use Illuminate\Http\Request;

use PDF;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $facturas = Factura::orderBy('id_factura_token', 'desc')->latest()->paginate($perPage);
        

        return view('facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
    
        return view('facturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        try {
            $requestData = $request->all();
        
            $factura = Factura::create($requestData);
    
            $trabajoData = array();
            $trabajoData['iva'] = $factura->iva;
            $trabajoData['id_factura'] = $factura->id;
    
            for ($i=0; $i < count($requestData['descrpciones']); $i++) { 
                $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
                $trabajoData['cantidad'] = $requestData['cantidades'][$i];
                $trabajoData['precio_u'] = $requestData['precios'][$i];
                $trabajoData['descuento'] = $requestData['descuentos'][$i];
                $trabajoData['importe'] = $requestData['importes'][$i];
    
                Trabajo::create($trabajoData);
            }
            
            
            return redirect('facturas')->with('success', 'Factura creada');
        } catch (\Throwable $th) {
            true;
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $factura = Factura::findOrFail($id);

        return view('facturas.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $factura = Factura::findOrFail($id);

        return view('facturas.edit', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $factura = Factura::findOrFail($id);
        $factura->update($requestData);

        Trabajo::where('id_factura', $factura->id)->delete();

        $trabajoData = array();
        $trabajoData['iva'] = $factura->iva;
        $trabajoData['id_factura'] = $factura->id;

        for ($i=0; $i < count($requestData['descrpciones']); $i++) { 
            $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
            $trabajoData['cantidad'] = $requestData['cantidades'][$i];
            $trabajoData['precio_u'] = $requestData['precios'][$i];
            $trabajoData['descuento'] = $requestData['descuentos'][$i];
            $trabajoData['importe'] = $requestData['importes'][$i];

            Trabajo::create($trabajoData);
        }

        return redirect('facturas')->with('success', 'Factura actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Factura::destroy($id);

        return redirect('facturas')->with('success', 'Factura eliminada');
    }

    public function getTrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Trabajo::where('id_factura', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
            $jsondata['descuentos'][$a] = $value->descuento;
            $jsondata['importes'][$a] = $value->importe;
            $a++;

        }

        echo json_encode($jsondata);

    }

    public function generarPDF($id){

        $factura = Factura::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Trabajo::where('id_factura', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['descuentos'][$a] = $value->descuento;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/facturas.facturaspdf', array('factura' => $factura, 'trabajos' => $trabajos))->setPaper('a4');

        return $pdf->download('factura' . $factura->fecha . '_' . $factura->id_factura_token . '.pdf');

    }

    public function enviarFactura(Request $request, $id){

        $factura = Factura::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Trabajo::where('id_factura', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['descuentos'][$a] = $value->descuento;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/facturas.facturaspdf', array('factura' => $factura, 'trabajos' => $trabajos))->setPaper('a4');

        $pdfPath = 'factura' . $factura->fecha . '_' . $factura->id_factura_token . '.pdf';
        $pdf->save(storage_path('../public/'.$pdfPath));

        Mail::to($factura->email_cliente, "Javier")
        ->send(new facturaMail($pdfPath));

        return redirect('facturas')->with('success', 'Correo enviado');

    }
    
    public function cambiarEstado(Request $request, $id){

        $factura = Factura::findOrFail($id);

        $factura->estado = !$factura->estado;

        $factura->update();

        return redirect('facturas')->with('success', 'Estado cambiado');

    }
}
