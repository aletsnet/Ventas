<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratos;
use App\Models\Estados;
use App\Models\UsersContrato;
use App\Models\User;
use App\Models\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(!acceso('Lista de usuarios',9001)){ return []; }
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $search = $request->search == '@' ? '' : $request->search;
        $c = $request->c ?? "";
        $rows = [];

        if($user->rol==1){
            if($c != ""){
                $rows = User::with('roles')->select('users.*')
                    ->join('users_contratos','users_contratos.user','=','users.id')
                    ->where('users_contratos.contrato','=',$c)
                    ->where(function($query) use($search){
                    if($search != ""){
                            $query->where('email','like','%'.$search.'%');
                            $query->OrWhere('name','like','%'.$search.'%');
                        }
                    })
                    ->paginate(10);
            }else{
                $rows = User::with('roles')->where(function($query) use($search){
                    if($search != ""){
                            $query->where('email','like','%'.$search.'%');
                            $query->OrWhere('name','like','%'.$search.'%');
                        }
                    })
                    ->paginate(10);    
            }
        }else{
            $rows = User::with('roles')->select('users.*')
                ->join('users_contratos','users_contratos.user','=','users.id')
                ->where('users_contratos.contrato','=',$contrato)
                ->where(function($query) use($search){
                if($search != ""){
                        $query->where('email','like','%'.$search.'%');
                        $query->OrWhere('name','like','%'.$search.'%');
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
        if(!acceso('Lista de usuarios',9003)){ return []; }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!acceso('Guardar registro nuevo Users',9001)){ return []; }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed',
            'rol' => 'required',
        ]);

        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $rol = $request->rol;
        if(!$contrato > 0 && $user->rol==1){
            $contrato = $request->contrato;
        }else{
            $rol = $rol < 2 ? $rol : 2;
        }

        $row = new User;
        $row->avatar = 'default/avatar.png';
        $row->name = $request->name;
        $row->email = $request->email;
        $row->password = \Hash::make($request->password);
        $row->rol = $rol;
        $row->user = $user->id;
        $row->save();

        $row_ = new UsersContrato;
        $row_->user = $row->id;
        $row_->contrato = $contrato;
        $row_->save();

        return $row;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $row = [];
        if(!acceso('Show usuario',9001)){ return []; }
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $rows = [];
        if($user->rol==1){
            $rows = User::with("Contrato")
                    ->where('users.id',$id)
                    ->first();
            //$row_ = UsersContrato::where('user',$id)->first();
            //$rows['contrato'] = $row_;
            $row = $rows;
        }else{
            $rows = UsersContrato::with("User","User.Contrato")->where('user',$id)->where('contrato', $contrato)->first();
            if($rows instanceof UsersContrato){
                $row = $rows->user;
            }
            \Log::Alert("row : ". ($row_->id ?? 'nan'));
        }
        return $row;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        if(!acceso('Edit usuario',9003)){ return []; }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        if(!acceso('Update Users',9001)){ return []; }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'confirmed',
            'rol' => 'required',
        ]);

        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $rol = $request->rol;
        $row = [];
        if($user->rol==1){
            $contrato = $request->contrato;
            $row = User::where('id',$id)->first();
            if($row instanceof User){
                //$row->avatar = 'vendor/adminlte/dist/img/avatar.png';
                $row->name = $request->name;
                $row->email = $request->email;
                if($request->password != ''){
                    $row->password = \Hash::make($request->password);
                }
                $row->rol = $rol;
                $row->user = $user->id;
                $row->save();

                $row_ = UsersContrato::where('user',$id)->where('contrato', $contrato)->first();
                if(!$row_ instanceof UsersContrato){
                    $row_ = new UsersContrato;
                    $row_->user = $row->id;
                    $row_->contrato = $contrato;
                    $row_->save();
                }
            }
        }else{
            $row_ = UsersContrato::where('user',$id)->where('contrato', $contrato)->first();
            $rol = $rol == 1 ? 2 : $rol;
            if($row_ instanceof UsersContrato){
                $row = User::where('id',$id)->first();
                if($row instanceof User){
                    //$row->avatar = 'vendor/adminlte/dist/img/avatar.png';
                    $row->name = $request->name;
                    $row->email = $request->email;
                    if($request->password != ''){
                        $row->password = \Hash::make($request->password);
                    }
                    $row->rol = $rol;
                    $row->user = $user->id;
                    $row->save();
                }
            }
        }

        return $row;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!acceso('Deleted usuario',9001)){ return []; }
        $user = \Auth::user();
        $contrato = \Session::get('ncontrato');
        $rows = [];
        if($user->rol==1){
            $row = User::where('id',$id)->delete();
        }else{
            
        }
    }

    public function page(Request $request){
        if(!acceso('show Users',9001)){ redirect()->route('home'); }
        $user = \Auth::user();
        $exite = checkcontrato();
        $contratos = Contratos::get();
        
        $roles = Roles::where('activo',1)->get();
        if($user->id > 1){
            $roles = Roles::where('activo',1)->where('id','>',1)->get();
            $contratos = $request->c;
        }

        $param = [
            'contratos'=> $contratos, 
            'roles' => $roles,
            'contrato' => (!$exite && $user->id == 1),
            'id_user' => $request->u,
            'contratos' => $contratos,
        ];

        return view('sistema.search', $param);
    }

    public function perfil(){
        $user = \Auth::user();
        return view('sistema.perfil', ['row' => $user]);
    }
}
