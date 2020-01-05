<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trabajo;
use App\Factura;
use Illuminate\Http\Request;

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

        if (!empty($keyword)) {
            $facturas = Factura::where('direccion', 'LIKE', "%$keyword%")
                ->orWhere('ciudad', 'LIKE', "%$keyword%")
                ->orWhere('codigo_postal', 'LIKE', "%$keyword%")
                ->orWhere('dni', 'LIKE', "%$keyword%")
                ->orWhere('telefono_personal', 'LIKE', "%$keyword%")
                ->orWhere('telefono_oficina', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('fecha', 'LIKE', "%$keyword%")
                ->orWhere('direccion_cliente', 'LIKE', "%$keyword%")
                ->orWhere('codigo_postal_cliente', 'LIKE', "%$keyword%")
                ->orWhere('dni_cliente', 'LIKE', "%$keyword%")
                ->orWhere('fecha_vencimiento', 'LIKE', "%$keyword%")
                ->orWhere('concepto', 'LIKE', "%$keyword%")
                ->orWhere('sucursal', 'LIKE', "%$keyword%")
                ->orWhere('iban', 'LIKE', "%$keyword%")
                ->orWhere('bic_switch', 'LIKE', "%$keyword%")
                ->orWhere('iva', 'LIKE', "%$keyword%")
                ->orWhere('importe', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $facturas = Factura::latest()->paginate($perPage);
        }

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
        
        
        return redirect('facturas')->with('flash_message', 'Factura added!');
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

        return redirect('facturas')->with('flash_message', 'Factura updated!');
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

        return redirect('facturas')->with('flash_message', 'Factura deleted!');
    }

    public function getTrabajos(Request $request){
        
        $jsondata = array();

        $a = 0;
        foreach (Trabajo::where('id_factura', $request->id)->get() as $value) {

            $jsondata['descripciones'][$a] = $value->descripcion;
            $jsondata['cantidades'][$a] = $value->cantidad;
            $jsondata['precios'][$a] = $value->precio;
            $jsondata['descuentos'][$a] = $value->descuento;
            $jsondata['importes'][$a] = $value->importe;
            $a++;

        }

        echo json_encode($jsondata);

    }
}
