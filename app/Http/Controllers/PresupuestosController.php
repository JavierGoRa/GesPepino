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

            for ($i=0; $i < count($requestData['descripciones']); $i++) { 
                $trabajoData['descripcion'] = $requestData['descripciones'][$i];
                $trabajoData['cantidad'] = $requestData['cantidades'][$i];
                $trabajoData['precio_u'] = $requestData['precios'][$i];
                $trabajoData['importe'] = $requestData['importes'][$i];

                Presupuestotrabajo::create($trabajoData);
            }
            
            return redirect('presupuestos')->with('success', 'Presupuesto creado');

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

        for ($i=0; $i < count($requestData['descripciones']); $i++) { 
            $trabajoData['descripcion'] = $requestData['descripciones'][$i];
            $trabajoData['cantidad'] = $requestData['cantidades'][$i];
            $trabajoData['precio_u'] = $requestData['precios'][$i];
            $trabajoData['importe'] = $requestData['importes'][$i];

            Presupuestotrabajo::create($trabajoData);
        }

        return redirect('presupuestos')->with('success', 'Presupuesto actualizado');
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

        return redirect('presupuestos')->with('success', 'Presupuesto eliminado');
    }

    public function getPresupuestotrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
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
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/presupuestos.presupuestospdf', array('presupuesto' => $presupuesto, 'trabajos' => $trabajos))->setPaper('a4');
        
        $fecha = date("d/m/Y", strtotime($presupuesto->fecha));

        return $pdf->download('presupuesto' . $fecha . '.pdf');

    }

    public function enviarFactura(Request $request, $id){

        $presupuesto = Presupuesto::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/presupuestos.presupuestospdf', array('presupuesto' => $presupuesto, 'trabajos' => $trabajos))->setPaper('a4');

        $fecha = date("d_m_Y", strtotime($presupuesto->fecha));

        $pdfPath = 'Presupuesto' . $fecha . '.pdf';
        $pdf->save(storage_path('../public/'.$pdfPath));


        Mail::to($presupuesto->email_cliente, "Javier")
        ->send(new presupuestoMail($pdfPath));

        return redirect('presupuestos')->with('success', 'Presupuesto enviado');

    }

    
    public function getTrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Presupuestotrabajo::where('id_presupuesto', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
            $jsondata['importes'][$a] = $value->importe;
            $a++;

        }

        echo json_encode($jsondata);

    }
}
