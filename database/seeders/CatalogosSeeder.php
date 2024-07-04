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
        \DB::table('catalogos')->insert(['id'=>1, 'nombre'=>'Estatus Contrato' ,'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>7, 'nombre'=>'Tipo Contrato' ,'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>2, 'nombre'=>'Tienda' ,'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>3, 'nombre'=>'Lista de Pro y Ser' ,'css' => '', 'orden' => '4', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>4, 'nombre'=>'Sesiones' ,'css' => '', 'orden' => '5', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>5, 'nombre'=>'Ventas' ,'css' => '', 'orden' => '6', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>6, 'nombre'=>'Inventarios' ,'css' => '', 'orden' => '7', 'activo' => 1]);
        \DB::table('catalogos')->insert(['id'=>9, 'nombre'=>'Status Menu' ,'css' => '', 'orden' => '9', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>1001, 'catalogo_id'=>1, 'opcion' => 'Disponible', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>1002, 'catalogo_id'=>1, 'opcion' => 'Inactivo', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>7001, 'catalogo_id'=>7, 'opcion' => 'Vitalicio', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>7002, 'catalogo_id'=>7, 'opcion' => 'Anual', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>7003, 'catalogo_id'=>7, 'opcion' => 'Mensual', 'valor'=>3, 'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>7004, 'catalogo_id'=>7, 'opcion' => 'Prueba 1M', 'valor'=>4, 'css' => '', 'orden' => '4', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>2001, 'catalogo_id'=>2, 'opcion' => 'Activa', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>2002, 'catalogo_id'=>2, 'opcion' => 'Inactiva', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>3001, 'catalogo_id'=>3, 'opcion' => 'Producto', 'valor'=>1, 'css' => 'badge bg-success', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>3002, 'catalogo_id'=>3, 'opcion' => 'Servicio', 'valor'=>2, 'css' => 'badge bg-danger', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>3003, 'catalogo_id'=>3, 'opcion' => 'Kit', 'valor'=>3, 'css' => 'badge bg-warning', 'orden' => '3', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>4001, 'catalogo_id'=>4, 'opcion' => 'Activo', 'valor'=>1, 'css' => 'badge bg-success', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>4002, 'catalogo_id'=>4, 'opcion' => 'Terminado', 'valor'=>2, 'css' => 'badge bg-danger', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>4003, 'catalogo_id'=>4, 'opcion' => 'Cancelado', 'valor'=>3, 'css' => 'badge bg-warning', 'orden' => '3', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>5001, 'catalogo_id'=>5, 'opcion' => 'Cotización', 'valor'=>1, 'css' => 'badge bg-success', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5002, 'catalogo_id'=>5, 'opcion' => 'En Proceso', 'valor'=>2, 'css' => 'badge bg-warning', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5003, 'catalogo_id'=>5, 'opcion' => 'Terminada', 'valor'=>3, 'css' => 'badge bg-success', 'orden' => '3', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5004, 'catalogo_id'=>5, 'opcion' => 'Cancelada', 'valor'=>4, 'css' => 'badge bg-danger', 'orden' => '4', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>5005, 'catalogo_id'=>5, 'opcion' => 'Facturada', 'valor'=>5, 'css' => 'badge bg-success', 'orden' => '5', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>6001, 'catalogo_id'=>6, 'opcion' => 'Disponible', 'valor'=>1, 'css' => 'badge bg-success', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>6002, 'catalogo_id'=>6, 'opcion' => 'Por Agotarse', 'valor'=>2, 'css' => 'badge bg-warning', 'orden' => '2', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>6003, 'catalogo_id'=>6, 'opcion' => 'Agotado', 'valor'=>3, 'css' => 'badge bg-danger', 'orden' => '3', 'activo' => 1]);

        \DB::table('catalogos_detalles')->insert(['id'=>9001, 'catalogo_id'=>9, 'opcion' => 'Activo', 'valor'=>1, 'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('catalogos_detalles')->insert(['id'=>9002, 'catalogo_id'=>9, 'opcion' => 'Inactivo', 'valor'=>2, 'css' => '', 'orden' => '2', 'activo' => 1]);
    }
}
