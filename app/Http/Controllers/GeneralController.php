<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function lists(Request $request){
        $result = [];
        $tabla = $request->tabla;
        $campos = $request->campos;
        $where = $request->where;
        $order = $request->order;
        if($tabla){
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
        }
        return $result;
    }
}
