<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Mail\presupuestoMail;

use App\Presupuestotrabajo;
use App\Presupuesto;
use Illuminate\Http\Request;

use PDF;

class PresupuestosController extends Controller
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

       
        $presupuestos = Presupuesto::orderBy('id', 'desc')->latest()->paginate($perPage);


        return view('presupuestos.index', compact('presupuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('presupuestos.create');
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
            
            $presupuesto = Presupuesto::create($requestData);

            $trabajoData = array();
            $trabajoData['iva'] = $presupuesto->iva;
            $trabajoData['id_presupuesto'] = $presupuesto->id;

            for ($i=0; $i < count($requestData['descrpciones']); $i++) { 
                $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
                $trabajoData['cantidad'] = $requestData['cantidades'][$i];
                $trabajoData['precio_u'] = $requestData['precios'][$i];
                $trabajoData['descuento'] = $requestData['descuentos'][$i];
                $trabajoData['importe'] = $requestData['importes'][$i];

                Presupuestotrabajo::create($trabajoData);
            }
            
            return redirect('presupuestos')->with('flash_message', 'Presupuesto added!');

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
        $presupuesto = Presupuesto::findOrFail($id);

        return view('presupuestos.show', compact('presupuesto'));
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
        $presupuesto = Presupuesto::findOrFail($id);

        return view('presupuestos.edit', compact('presupuesto'));
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
        
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->update($requestData);

        Presupuestotrabajo::where('id_presupuesto', $presupuesto->id)->delete();

        $trabajoData = array();
        $trabajoData['iva'] = $presupuesto->iva;
        $trabajoData['id_presupuesto'] = $presupuesto->id;

        for ($i=0; $i < count($requestData['descrpciones']); $i++) { 
            $trabajoData['descripcion'] = $requestData['descrpciones'][$i];
            $trabajoData['cantidad'] = $requestData['cantidades'][$i];
            $trabajoData['precio_u'] = $requestData['precios'][$i];
            $trabajoData['descuento'] = $requestData['descuentos'][$i];
            $trabajoData['importe'] = $requestData['importes'][$i];

            Presupuestotrabajo::create($trabajoData);
        }

        return redirect('presupuestos')->with('flash_message', 'Presupuesto updated!');
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
        Presupuesto::destroy($id);

        return redirect('presupuestos')->with('flash_message', 'Presupuesto deleted!');
    }

    public function getPresupuestotrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $request->id)->get() as $value) {

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

        $presupuesto = Presupuesto::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['descuentos'][$a] = $value->descuento;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/presupuestos.presupuestospdf', array('presupuesto' => $presupuesto, 'trabajos' => $trabajos))->setPaper('a4');

        return $pdf->download('presupuesto.pdf');

    }

    public function enviarFactura(Request $request, $id){

        $presupuesto = Presupuesto::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['descuentos'][$a] = $value->descuento;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/presupuestos.presupuestospdf', array('presupuesto' => $presupuesto, 'trabajos' => $trabajos))->setPaper('a4');

        $pdfPath = 'presupuesto' . $presupuesto->id . '.pdf';
        $pdf->save(storage_path('../public/'.$pdfPath));


        Mail::to($presupuesto->email_cliente, "Javier")
        ->send(new presupuestoMail($pdfPath));

        return true;

    }

    
    public function getTrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
            $jsondata['descuentos'][$a] = $value->descuento;
            $jsondata['importes'][$a] = $value->importe;
            $a++;

        }

        echo json_encode($jsondata);

    }
}
