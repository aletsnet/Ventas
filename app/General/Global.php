<?php

    function acceso($page = "",$menu = '1000',$permiso = '00000'){
        $access = true;
        $user = \Auth::user();
        $item = App\Models\MenuPermisos::where('roles',$user->rol)->where('menu',$menu)->first();
        $access = ($item instanceof App\Models\MenuPermisos);
        \Log::info($_SERVER['REMOTE_ADDR'] . " -> " . $user->name . " -> " . $page . " -> " . ($access ? "TRUE" : "FALSE"));
        return $access;
    }

    function checkcontrato(){
        $contrato = false;
        $user = \Auth::user();
        $row = App\Models\UsersContrato::with('contrato','contrato.municipios')->where('user',$user->id)->first();
        $contrato = $row instanceof App\Models\UsersContrato;
        $ncontrato = $contrato ? $row->contrato : 0;
        Session::put('ncontrato', $ncontrato);
        Session::put('mcontrato', $row->Contrato->Municipios->municipio ?? 0);
        Session::put('econtrato', $row->Contrato->estado ?? 0);
        return $contrato;
    }

    function old_fecha($fecha){
        if($fecha != ""){
            $fecha2 = explode(' ',$fecha);
            $n = explode("/",$fecha2[0]);
            if(count($n)>2){
                $fecha = (isset($n[2])?$n[2]:"0000")."-".(isset($n[1])?$n[1]:"00")."-".$n[0];
            }else{
                $n = explode("-",$fecha2[0]);
                $fecha = $n[2]."/".$n[1]."/".$n[0];
            }
            //$fecha = $fecha . " " . (isset($fecha2[1])?$fecha2[1]:"");
        }
        return trim($fecha);
    }
    
    function fecha($fecha){
        if($fecha != ""){
            $fecha2 = explode(' ',$fecha);
            $n = explode("/",$fecha2[0]);
            if(count($n)>2){
                $fecha = (isset($n[2])?$n[2]:"0000")."-".(isset($n[1])?$n[1]:"00")."-".$n[0];
            }else{
                $n = explode("-",$fecha2[0]);
                $fecha = $n[2]."/".$n[1]."/".$n[0];
            }
            $fecha = $fecha . " " . (isset($fecha2[1])?$fecha2[1]:"");
        }
        return trim($fecha);
    }

    function letraXLS($indice){
        $letra = '';
        $letrasa = explode(',',',A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z');
        $letrasb = explode(',','A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z');
        $a = intval($indice / 26);
        $b = $indice - (26 * $a);

        if($a > 0 && $b==0){
            $a = $a -1;
            $b = 26;
        }

        $letra .= $letrasa[$a] . $letrasa[$b];

        //\Log::debug($indice . " = " . $a . " " . $b . " - " . $letra);

        return $letra;
    }