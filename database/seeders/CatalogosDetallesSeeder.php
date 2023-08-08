<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatalogosDetallesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('catalogos_detalles')->insert(['id'=>1001, 'catalogo_id'=>1, 'opcion' => 'Borrador', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>1002, 'catalogo_id'=>1, 'opcion' => 'Activo', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>1003, 'catalogo_id'=>1, 'opcion' => 'Edición', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>1004, 'catalogo_id'=>1, 'opcion' => 'Inactivo', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>2001, 'catalogo_id'=>2, 'opcion' => 'Cotizando', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2002, 'catalogo_id'=>2, 'opcion' => 'Publicado', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2003, 'catalogo_id'=>2, 'opcion' => 'Por Salir', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2004, 'catalogo_id'=>2, 'opcion' => 'En Viaje', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2005, 'catalogo_id'=>2, 'opcion' => 'Termiando', 'valor'=>5, 'css' => '', 'orden' => '5', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2006, 'catalogo_id'=>2, 'opcion' => 'Cancelado', 'valor'=>6, 'css' => '', 'orden' => '6', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>3001, 'catalogo_id'=>3, 'opcion' => 'Activa', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>3002, 'catalogo_id'=>3, 'opcion' => 'Termianda', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>3003, 'catalogo_id'=>3, 'opcion' => 'Cancelada', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>3004, 'catalogo_id'=>3, 'opcion' => 'Pausa', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>4001, 'catalogo_id'=>4, 'opcion' => 'Normal', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>4002, 'catalogo_id'=>4, 'opcion' => 'Publica', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>4003, 'catalogo_id'=>4, 'opcion' => 'Privada', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>4004, 'catalogo_id'=>4, 'opcion' => 'Cancelada', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);
        
        \DB::table('catalogos_detalles')->insert(['id'=>5001, 'catalogo_id'=>4, 'opcion' => 'Sin definir', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5002, 'catalogo_id'=>4, 'opcion' => 'KM', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5003, 'catalogo_id'=>4, 'opcion' => 'Millas', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5004, 'catalogo_id'=>4, 'opcion' => 'Millas nauticas', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);
    }
}
