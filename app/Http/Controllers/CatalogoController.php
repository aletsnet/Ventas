<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalogo;

class CatalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Catalogo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $catalogo = new Catalogo;
        $catalogo->activo = $request->activo;
        $catalogo->css = $request->css;
        $catalogo->icon = $request->icon;
        $catalogo->nombre = $request->nombre;
        $catalogo->orden = $request->orden;
        $catalogo->picture = $request->picture;
        $catalogo->style = $request->style;
        $catalogo->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalogo = Catalogo::find($id);
        $catalogo->delete();
    }
}
