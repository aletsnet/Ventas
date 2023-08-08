<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('catalogos')->insert(['id'=>1, 'nombre'=>'Tipo de viaje' ,'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>2, 'nombre'=>'Tipo de status' ,'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>3, 'nombre'=>'Status de sesion' ,'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>4, 'nombre'=>'Tipo de registro' ,'css' => '', 'orden' => '4', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>5, 'nombre'=>'Medidas' ,'css' => '', 'orden' => '5', 'activo' => 1]);
    }
}
