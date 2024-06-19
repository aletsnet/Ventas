<?php

namespace App\Http\Controllers;

use App\Models\Contratos;
use App\Models\CatalogosDetalles;
use App\Models\Estados;
use Illuminate\Http\Request;

use Auth;

class ContratosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!acceso('page punteo',5001)){ return redirect()->route('home'); }

        $user = Auth::user();
        $filter = [ 'search' => $request->search, 'user' => Auth::user() ] ;

        $search = $request->search == '@' ? '' : $request->search;

        //$list_roles = Roles::where('activo',1)->orderBy('orden')->pluck('nombre','id');
        $data = Contratos::with("User","Status","Tipo","Municipio","Estado")->where('nombre','like','%'.$search.'%')
                        ->orwhere('telefono','like','%'.$search.'%')
                        ->orderBy('id','desc')
                        ->paginate(15);

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!acceso('page punteo',5001)){ return []; }
        return [];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!acceso('page punteo',5001)){ return []; }
        
        $user = \Auth::user();

        $request->validate([
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'telefono' => 'required|string|max:12',
            'estado' => 'required',
            'municipio' => 'required',
            'tipo' => 'required',
            'estatus' => 'required'
        ]);

        $use = new User;
        $use->name = $request->name;
        $use->email = $request->email;
        $use->password = $request->password;
        $use->save();

        $row = new Contratos;
        $row->nombre = $request->name;
        $row->telefono = $request->telefono;
        $row->user = $use->id;
        $row->estado = $request->estado;
        $row->municipio = $request->municipio;
        $row->tipo = $request->tipo;
        $row->status = $request->estatus;
        $row->save();
        
        //return [];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!acceso('page punteo',5001)){ return []; }
        $row = Contratos::with("User","Status","Tipo","Municipio","Estado")
                    ->where('id',$id)
                    ->first();
        return $row;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!acceso('page punteo',5001)){ return []; }
        return [];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!acceso('page punteo',5001)){ return []; }
        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!acceso('page punteo',5001)){ return []; }
        $row = Contratos::with("User","Status","Tipo","Municipio","Estado")
                    ->where('id',$id)
                    ->first();
        if($row instanceof Contratos){
            $row->delete();
        }
        return $row;
    }

    public function page(){
        if(!acceso('page punteo',5001)){ return redirect()->route('home'); }
        $status = CatalogosDetalles::where("catalogo_id",1)->where("activo",1)->get();
        $tipos = CatalogosDetalles::where("catalogo_id",7)->where("activo",1)->get();
        $estados = Estados::get();
        $param = [
               'status' => $status,
               'tipos' => $tipos,
               'estados' => $estados
            ];
        return view('admin.contracts.search', $param);
    }
}
