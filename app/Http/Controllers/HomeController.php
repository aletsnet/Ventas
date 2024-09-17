<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = "home";
        $user_sesion = \Auth::user();
        $user = User::with("roles","contrato")->where("id",$user_sesion->id)->first();
        $exite = checkcontrato();
        $contrato = \Session::get('ncontrato');
        if($user->email_verified_at == null){
            $page = "post.validaremail";
        }
        $param = [ 
            'row' => $user
        ];
        return view($page, $param);
    }
}
