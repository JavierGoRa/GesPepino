<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

use App\Mail\ordenMail;

use App\Trabajo;
use App\orden;
use Illuminate\Http\Request;

use PDF;
use DB;
use Redirect;
class OrdenesController extends Controller
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
            $ordenes = Orden::orderBy('fecha_recepcion', 'desc')->whereYear('fecha_recepcion', '=', $request->ano)->latest()->paginate($perPage);
        } else {
            $ordenes = Orden::orderBy('fecha_recepcion', 'desc')->latest()->paginate($perPage);
        }

        $fechasSelectibles[] = array();
        $fechas = Orden::select('fecha_recepcion', 'id')->where('fecha_recepcion', '!=', null)->get();

        foreach ($fechas as $key => $value) {

            $time = strtotime($value->fecha_recepcion);
            $newformat = date('Y',$time);

            if(!in_array($newformat, $fechasSelectibles)){
                array_push($fechasSelectibles, $newformat);
            }

        }

        return view('ordenes.index', compact('ordenes', 'fechasSelectibles', 'anoSeleccionado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {

        try {
            
        
            $orden = Orden::orderby('id')->latest()->get()[0];
            ++$orden->id_orden_token;
            
            return view('ordenes.create', compact('orden'));
            
        } catch (\Throwable $th) {
            return view('ordenes.create');
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
            //dd($requestData);
            $orden = Orden::create($requestData);            
            
            return redirect('ordenes')->with('success', 'orden creada');
        } catch (\Throwable $th) {
            dd($th);
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
        $orden = Orden::findOrFail($id);

        return view('ordenes.show', compact('orden'));
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
        $orden = Orden::findOrFail($id);

        return view('ordenes.edit', compact('orden'));
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
        
        $orden = Orden::findOrFail($id);
        $orden->update($requestData);

        return redirect('ordenes')->with('success', 'orden actualizada');
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
        Orden::destroy($id);

        return redirect('ordenes')->with('success', 'orden eliminada');
    }

    public function getTrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Trabajo::where('id_orden', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio_u;
            $jsondata['importes'][$a] = $value->importe;
            $a++;

        }

        echo json_encode($jsondata);

    }

    public function generarPDF($id){

        $orden = Orden::find($id);

        $pdf = PDF::loadView('/ordenes.ordenespdf', array('orden' => $orden))->setPaper('a4');

        $fecha = date("d/m/Y", strtotime($orden->fecha_recepcion));

        return $pdf->download('orden' . $fecha . '_' . $orden->id_orden_token . '.pdf');

    }

    public function enviarorden(Request $request, $id){

        $orden = Orden::find($id);

        $trabajos = array();

        $a = 0;
        foreach (Trabajo::where('id_orden', $id)->get() as $value) {

            $trabajos['descripciones'][$a] = $value->descripcion;
            $trabajos['cantidades'][$a] = $value->cantidad;
            $trabajos['precios'][$a] = $value->precio_u;
            $trabajos['importes'][$a] = $value->importe;
            $a++;

        }

        $pdf = PDF::loadView('/ordenes.ordenespdf', array('orden' => $orden, 'trabajos' => $trabajos))->setPaper('a4');

        $fecha = date("d_m_Y", strtotime($orden->fecha));

        $pdfPath = 'orden' . $fecha . '_' . $orden->id_orden_token . '.pdf';
        $pdf->save(storage_path('../public/'.$pdfPath));

        Mail::to($orden->email_cliente, "Javier")
        ->send(new ordenMail($pdfPath));

        return redirect('ordenes')->with('success', 'Correo enviado');

    }
    
    public function cambiarEstado(Request $request, $id){

        $orden = Orden::findOrFail($id);
        $orden->estado = !$orden->estado;
        $orden->update();
        return redirect('ordenes')->with('success', 'Estado cambiado');

    }
}
