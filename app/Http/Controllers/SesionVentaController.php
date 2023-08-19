<?php

namespace App\Http\Controllers;

use App\Models\SesionVenta;
use Illuminate\Http\Request;

class SesionVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sesionVenta = new SesionVenta();
 
        $sesionVenta->apertura = now();
        $sesionVenta->inicio = 0.0;
        $sesionVenta->entradas = 0.0;
        $sesionVenta->salidas = 0.0;
        $sesionVenta->total = 0.0;
        $sesionVenta->user = 1;
        $sesionVenta->status = 1;
        $sesionVenta->sesion_hash = $request->sesion_hash;
 
        $sesionVenta->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sesionVenta = SesionVenta::where('sesion_hash',$id)->get(['id','apertura','cierre','inicio','entradas','salidas','total','status','sesion_hash']);
        return $sesionVenta;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sesionVenta = SesionVenta::find($id);

        $sesionVenta->cierre = now();
        $sesionVenta->inicio = $request->inicio;
        $sesionVenta->entradas = $request->entradas;
        $sesionVenta->salidas = $request->salidas;
        $sesionVenta->total = $request->total;
        $sesionVenta->status = $request->status;

        $sesionVenta->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
