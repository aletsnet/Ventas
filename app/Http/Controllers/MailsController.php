<?php

namespace App\Http\Controllers;

use App\Mail\ValidateEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;


class MailsController extends Controller
{
    public function mail_reenvio(Request $request){
        //$id_user = $request->id_user;
        $email = $request->email;

        $user = \Auth::user();
        if($user->email != $email){
            $user->email = $email;
            $user->save();
        }

        //$user->sendEmailVerificationNotification();
        Mail::to($user->email)->send(new VerifyEmail($user));

        return $user;
    }

    /*
    public function mail_valido($token){
        //$token = 'tu-token-de-validacion'; // Reemplaza con el token real
        //Mail::to('tucorreoelectronico@gmail.com')->send(new ValidateEmail($token));
        //return 'Correo electrónico enviado';
        //return redirect()->route('home');
        $user = \Auth::user();
        $mensaje = "";
        if($token != ""){
            $item = User::where("email_verified_at", $token)->where("id",$user->id)->first();
            if(!$item instanceof User){
                $mensaje = "No se puede validar, es posible que el token o el correo no sean validos";
            }else{
                $mensaje = "Valido";
                $item->email_verified_at = true;
                $item->save();
                return redirect()->route('home');
            }
        }else{
            $mensaje = "No se puede validar";
        }

        return view('agreement.sinvalides');
    }

    public function mail_token(){
        //$token = 'tu-token-de-validacion'; // Reemplaza con el token real
        //Mail::to('tucorreoelectronico@gmail.com')->send(new ValidateEmail($token));
        //return 'Correo electrónico enviado';
        //return redirect()->route('home');
        $user = \Auth::user();
        $mensaje = "";
        if($token != ""){
            $item = User::where("email_verified_at", $token)->where("id",$user->id)->first();
            if(!$item instanceof User){
                $mensaje = "No se puede validar, es posible que el token o el correo no sean validos";
            }else{
                $mensaje = "Valido";
                $item->email_verified_at = true;
                $item->save();
                return redirect()->route('home');
            }
        }else{
            $mensaje = "No se puede validar";
        }

        return view('agreement.sinvalides');
    }
    */
}
