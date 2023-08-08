<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles
        \DB::table('roles')->insert(['id'=>1, 'nombre'=>'Administrador' ,'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>2, 'nombre'=>'Gerente' ,'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>3, 'nombre'=>'Staff' ,'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>4, 'nombre'=>'Escuela' ,'css' => '', 'orden' => '4', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>5, 'nombre'=>'Maestro' ,'css' => '', 'orden' => '5', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>6, 'nombre'=>'Alumnos' ,'css' => '', 'orden' => '6', 'activo' => 1]);
    }
}
