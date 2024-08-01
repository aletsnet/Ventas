<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class GeneralController extends Controller
{
    public function lists(Request $request){
        $result = [];
        $tabla = $request->tabla;
        $campos = $request->campos;
        $where = $request->where;
        $order = $request->order;

        if($tabla){
            switch($tabla){
                case "municipios":
                    $lists = \DB::table($tabla);
                    $elementos = [];
                    if ($campos) {
                        foreach($campos as $item){
                            $elementos[] = $item['campo'];
                        }
                    }
                    
                    $lists->select($elementos);
        
                    if ($where) {
                        foreach($where as $item){
                            $lists->where($item['campo'], $item['condicional'], $item['valor']);
                        }
                    }
                    
                    if ($order) {
                        $lists->orderBy($order);
                    }
        
                    $result = $lists->get();

                break;
                
                default:
                    $result = [$campos[0] => "Error"];
                    break;
            }
            
        }
        return $result;
    }

    public function logos(Request $request){
        $user = \Auth::user();
        $data = [];

        $request->validate([
            'file' => 'required|mimes:gif,png,jpg|max:141943040',
        ]);

        $pathSave = sha1(rand(1000,9999) . date('ymd His'));
        $file = $request->file;
        $url = $pathSave . "/" . str_replace(" ", "", $file->getClientOriginalName());
        $actual = Storage::disk('public')->put($pathSave,$file);
        Storage::disk('public')->move($actual, $url);

        $data = [
                    'name' => $file->getClientOriginalName(),
                    'url' => $url,
                ];
        return $data;
    }
}
