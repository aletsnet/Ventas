<?php

namespace App\Http\Controllers;

use App\Models\Tiendas;
use App\Models\Contratos;
use App\Models\Estados;
use App\Models\UsersContrato;
use App\Models\User;
use App\Models\Roles;
use App\Models\Giros;

use Illuminate\Http\Request;

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!acceso('Lista de tiendas',5004)){ return []; }
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $search = $request->search == '@' ? '' : $request->search;

        if($user->rol==1){
            $rows = Tiendas::with("Giro", "Contrato", "Estado","Municipio")->where(function($query) use($search){
            if($search != ""){
                    $query->where('nombre','like','%'.$search.'%');
                    $query->OrWhere('telefono','like','%'.$search.'%');
                }
            })
            ->paginate(10);
        }else{
            $rows = Tiendas::where('contrato',$contrato)
                ->where(function($query) use($search){
                if($search != ""){
                        $query->where('nombre','like','%'.$search.'%');
                        $query->OrWhere('telefono','like','%'.$search.'%');
                    }
                })
                ->paginate(10);
        }

        return $rows;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!acceso('Lista de tiendas',5004)){ return []; }
        return [];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!acceso('Guardar nueva tienda',5004)){ return []; }
        $request->validate([
            'nombre' => 'max:200',
            'telefono' => 'max:12',
            'direccion ' => 'max:2550',
            'contrato' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');

        if($contrato != ""){
            $contrato = $request->contrato;
        }

        $row = new Tiendas;
        $row->nombre = $request->nombre;
        $row->telefono = $request->telefono;
        $row->logo = $request->logo;
        $row->direccion = $request->direccion;
        $row->ticket_head = $request->ticket_head;
        $row->ticket_foot = $request->ticket_foot;
        $row->ticket_css = $request->ticket_css;
        $row->sesion_compartido = $request->sesion_compartido;
        $row->user = $user->id;
        $row->contrato = $contrato;
        $row->giro = $request->giro;
        $row->status = 2001;
        $row->estado = $request->estado;
        $row->municipio = $request->municipio;
        $row->save();

        return $row;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if(!acceso('Mostrar tienda',5004)){ return []; }
        $row = [];
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');

        if($user->rol==1){
            $row = Tiendas::where("id", $id)->first();
        }else{
            $row = Tiendas::where('contrato',$contrato)
                ->where("id", $id)->first();
        }

        return $row;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!acceso('editar tienda',5004)){ return []; }
        return [];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(!acceso('actualizar tienda',5004)){ return []; }
        $request->validate([
            'nombre' => 'max:200',
            'telefono' => 'max:12',
            'direccion ' => 'max:2550',
            'contrato' => 'required',
            'estado' => 'required',
            'municipio' => 'required',
        ]);

        $row = [];
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');

        if($contrato != ""){
            $contrato = $request->contrato;
        }

        //$row = new Tiendas;

        if($user->rol==1){
            $row = Tiendas::where("id", $id)->first();
        }else{
            $row = Tiendas::where('contrato',$contrato)
                ->where("id", $id)->first();
        }

        if($row instanceof Tiendas){
            $row->nombre = $request->nombre;
            $row->telefono = $request->telefono;
            $row->logo = $request->logo;
            $row->direccion = $request->direccion;
            $row->ticket_head = $request->ticket_head;
            $row->ticket_foot = $request->ticket_foot;
            $row->ticket_css = $request->ticket_css;
            $row->sesion_compartido = $request->sesion_compartido;
            $row->user = $user->id;
            $row->contrato = $contrato;
            $row->giro = $request->giro;
            $row->status = 2001;
            $row->estado = $request->estado;
            $row->municipio = $request->municipio;
            $row->save();
        }
        return $row;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!acceso('elminiar tienda',5004)){ return []; }

        if($user->rol==1){
            $row = Tiendas::where("id", $id)->first();
        }else{
            $row = Tiendas::where('contrato',$contrato)
                ->where("id", $id)->first();
        }
        if($row instanceof Tiendas){
            $row->delete();
        }
        return $row;
    }

    public function page(Request $request){
        if(!acceso('show page tienda',5004)){ redirect()->route('home'); }
        $user = \Auth::user();
        $exite = checkcontrato();
        
        $roles = Roles::where('activo',1)->get();
        if($user->id > 1){
            $roles = Roles::where('activo',1)->where('id','>',1)->get();
        }

        $giros = Giros::get();
        $estados = Estados::get();

        $contratos = Contratos::get();
        $param = [
            'contratos'=> $contratos, 
            'giros' => $giros,
            'contrato' => (!$exite && $user->id == 1),
            'estados' => $estados,
            'id_user' => $request->u,
        ];

        return view('shop.search', $param);
    }
}
