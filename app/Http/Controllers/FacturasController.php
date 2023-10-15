<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Mail\facturaMail;

use App\Trabajo;
use App\Cliente;
use App\Factura;
use Illuminate\Http\Request;

use PDF;
use DB;
use Redirect;
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

        $anoSeleccionado = null;

        if($request->ano){
            $anoSeleccionado = $request->ano;
            $facturas = Factura::orderBy('fecha', 'desc')->whereYear('fecha', '=', $request->ano)->latest()->paginate($perPage);
        } else {
            
            if (!empty($keyword)) {
                $facturas = Factura::where('tipo_documento', 'LIKE', "%$keyword%")
                    ->orWhere('nombre_cliente', 'LIKE', "%$keyword%")
                    ->orWhere('dni_cliente', 'LIKE', "%$keyword%")
                    ->orWhere('codigo_postal_cliente', 'LIKE', "%$keyword%")
                    ->orWhere('matricula', 'LIKE', "%$keyword%")
                    ->latest()->paginate($perPage);
            } else {
                $facturas = Factura::orderBy('fecha', 'desc')->latest()->paginate($perPage);
            }
        }

        $fechasSelectibles[] = array();
        $fechas = Factura::select('fecha', 'id')->where('fecha', '!=', null)->get();

        foreach ($fechas as $key => $value) {

            $time = strtotime($value->fecha);
            $newformat = date('Y',$time);

            if(!in_array($newformat, $fechasSelectibles)){
                array_push($fechasSelectibles, $newformat);
            }

        }

        return view('facturas.index', compact('facturas', 'fechasSelectibles', 'anoSeleccionado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {

        try {

            $factura = Factura::orderby('id_factura_token', 'desc')->latest()->get()[0];
            $facturaToken = ++$factura->id_factura_token;
    
            //++$factura->id_factura_token;
            $tiposDocumentos = ['Factura', 'Albarán', 'Presupuesto', 'O.T.'];
            $clientes = Cliente::orderby('id')->latest();

            return view('facturas.create', compact('facturaToken', 'tiposDocumentos', 'clientes'));

        } catch (\Throwable $th) {
            $tiposDocumentos = ['Factura', 'Albarán', 'Presupuesto'];
            $clientes = Cliente::orderby('id')->latest();
            return view('facturas.create', compact('tiposDocumentos', 'clientes'));
        }
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

            dd($requestData);
        
            $factura = Factura::create($requestData);
    
            $trabajoData = array();
            $trabajoData['iva'] = $factura->iva;
            $trabajoData['id_factura'] = $factura->id;
    
            for ($i=0; $i < count($requestData['descrpciones']); $i++) { 
                $trabajoData['referencia'] = $requestData['referencias'][$i];
                $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
                $trabajoData['cantidad'] = $requestData['cantidades'][$i];
                $trabajoData['precio_u'] = $requestData['precios'][$i];
                $trabajoData['iva'] = $requestData['ivas'][$i];
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
        $tiposDocumentos = ['Factura', 'Albarán', 'Presupuesto', 'O.T.'];
        $clientes = Cliente::orderby('nombre_cliente')->latest()->get();
        $facturaToken = $factura->id_factura_token;

        return view('facturas.edit', compact('factura', 'facturaToken', 'tiposDocumentos', 'clientes'));
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
            $trabajoData['referencia'] = $requestData['referencias'][$i];
            $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
            $trabajoData['cantidad'] = $requestData['cantidades'][$i];
            $trabajoData['precio_u'] = $requestData['precios'][$i];
            $trabajoData['iva'] = $requestData['ivas'][$i];
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

            $jsondata['referencias'][$a] = $value->referencia;
            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
            $jsondata['ivas'][$a] = $value->iva;
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

            $trabajos['referencias'][$a] = $value->referencia;
            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['ivas'][$a] = $value->iva;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/facturas.facturaspdf', array('factura' => $factura, 'trabajos' => $trabajos))->setPaper('a4');

        $fecha = date("d/m/Y", strtotime($factura->fecha));

        return $pdf->download('factura' . $fecha . '_' . $factura->id_factura_token . '.pdf');

    }

    public function enviarFactura(Request $request, $id){

        $factura = Factura::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Trabajo::where('id_factura', $id)->get() as $value) {

            $trabajos['referencias'][$a] = $value->referencia;
            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/facturas.facturaspdf', array('factura' => $factura, 'trabajos' => $trabajos))->setPaper('a4');

        $fecha = date("d_m_Y", strtotime($factura->fecha));

        $pdfPath = 'factura' . $fecha . '_' . $factura->id_factura_token . '.pdf';
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
    
    public function getNextToken(Request $request){
        $jsondata = array();
        try {
            $jsondata['token'] = ++Factura::where('tipo_documento', $request->tipo)->orderby('id_factura_token', 'desc')->latest()->get()[0]->id_factura_token;
        } catch (\Throwable $th) {
            $jsondata['token'] = 1;
        }

        echo json_encode($jsondata);
    }
}
