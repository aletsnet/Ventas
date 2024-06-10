<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        
        \DB::table('catalogos')->insert(['id'=>8, 'nombre'=>'Themes status' ,'css' => '', 'orden' => '8', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>8001, 'catalogo_id'=>8, 'opcion' => 'Disponible', 'valor'=>1, 'css' => 'badge bg-success', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>8002, 'catalogo_id'=>8, 'opcion' => 'En uso', 'valor'=>2, 'css' => 'badge bg-teal', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>8003, 'catalogo_id'=>8, 'opcion' => 'No disponible', 'valor'=>3, 'css' => 'badge bg-red', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>8004, 'catalogo_id'=>8, 'opcion' => 'Exclusivo', 'valor'=>4, 'css' => 'badge bg-purple', 'orden' => '4', 'activo' => 1]);
        
        \DB::table('menu')->insert(['id'=>5004, 'padre'=>5000, 'menu'=>'Themes', 'ruta'=>'themes.page', 'status' => 9001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>5005]);

        \DB::table('themes')->insert(
            [
                'id'=>1, 
                'nombre' => "Default",
                'head' => "",
                'body' => "",
                'foot' => "",
                'script' => "",
                'pack' => "",
                'status'=> 1002
            ]);
    }
}
