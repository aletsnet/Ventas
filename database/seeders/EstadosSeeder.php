<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('estados')->insert(['id'=>1, 'nombre'=>'AGUASCALIENTES']);
        \DB::table('estados')->insert(['id'=>2, 'nombre'=>'BAJA CALIFORNIA']);
        \DB::table('estados')->insert(['id'=>3, 'nombre'=>'BAJA CALIFORNIA SUR']);
        \DB::table('estados')->insert(['id'=>4, 'nombre'=>'CAMPECHE']);
        \DB::table('estados')->insert(['id'=>7, 'nombre'=>'CHIAPAS']);
        \DB::table('estados')->insert(['id'=>8, 'nombre'=>'CHIHUAHUA']);
        \DB::table('estados')->insert(['id'=>9, 'nombre'=>'CIUDAD DE MEXICO']);
        \DB::table('estados')->insert(['id'=>5, 'nombre'=>'COAHUILA DE ZARAGOZA']);
        \DB::table('estados')->insert(['id'=>6, 'nombre'=>'COLIMA']);
        \DB::table('estados')->insert(['id'=>10, 'nombre'=>'DURANGO']);
        \DB::table('estados')->insert(['id'=>11, 'nombre'=>'GUANAJUATO']);
        \DB::table('estados')->insert(['id'=>12, 'nombre'=>'GUERRERO']);
        \DB::table('estados')->insert(['id'=>13, 'nombre'=>'HIDALGO']);
        \DB::table('estados')->insert(['id'=>14, 'nombre'=>'JALISCO']);
        \DB::table('estados')->insert(['id'=>15, 'nombre'=>'MEXICO']);
        \DB::table('estados')->insert(['id'=>16, 'nombre'=>'MICHOACAN  DE OCAMPO']);
        \DB::table('estados')->insert(['id'=>17, 'nombre'=>'MORELOS']);
        \DB::table('estados')->insert(['id'=>18, 'nombre'=>'NAYARIT']);
        \DB::table('estados')->insert(['id'=>19, 'nombre'=>'NUEVO LEON']);
        \DB::table('estados')->insert(['id'=>20, 'nombre'=>'OAXACA']);
        \DB::table('estados')->insert(['id'=>21, 'nombre'=>'PUEBLA']);
        \DB::table('estados')->insert(['id'=>22, 'nombre'=>'QUERETARO']);
        \DB::table('estados')->insert(['id'=>23, 'nombre'=>'QUINTANA ROO']);
        \DB::table('estados')->insert(['id'=>24, 'nombre'=>'SAN LUIS POTOSI']);
        \DB::table('estados')->insert(['id'=>25, 'nombre'=>'SINALOA']);
        \DB::table('estados')->insert(['id'=>26, 'nombre'=>'SONORA']);
        \DB::table('estados')->insert(['id'=>27, 'nombre'=>'TABASCO']);
        \DB::table('estados')->insert(['id'=>28, 'nombre'=>'TAMAULIPAS']);
        \DB::table('estados')->insert(['id'=>29, 'nombre'=>'TLAXCALA']);
        \DB::table('estados')->insert(['id'=>30, 'nombre'=>'VERACRUZ DE IGNACIO DE LA LLAVE']);
        \DB::table('estados')->insert(['id'=>31, 'nombre'=>'YUCATAN']);
        \DB::table('estados')->insert(['id'=>32, 'nombre'=>'ZACATECAS']);
    }
}
