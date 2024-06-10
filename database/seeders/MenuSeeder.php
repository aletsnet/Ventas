<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert(['id'=>1, 'nombre'=>'Root' ,'css' => '', 'orden' => '1', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>2, 'nombre'=>'Administrador' ,'css' => '', 'orden' => '2', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>3, 'nombre'=>'Gerente' ,'css' => '', 'orden' => '3', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>4, 'nombre'=>'Cajero' ,'css' => '', 'orden' => '4', 'activo' => 1]);
        \DB::table('roles')->insert(['id'=>5, 'nombre'=>'Inventarios' ,'css' => '', 'orden' => '5', 'activo' => 1]);

        \DB::table('menu')->insert(['id'=>1000, 'menu'=>'Venta', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>2000, 'menu'=>'Productos', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>3000, 'menu'=>'Inventarios', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>4000, 'menu'=>'Cortes', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>5000, 'menu'=>'Admin', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>9000, 'menu'=>'Sistemas', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>1001, 'padre'=>1000, 'menu'=>'Caja - TPV', 'ruta'=>'box.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>1002, 'padre'=>1000, 'menu'=>'Ventas Realizadas', 'ruta'=>'shop.page', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>2001, 'padre'=>2000, 'menu'=>'Lista', 'ruta'=>'art.report', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>2002, 'padre'=>2000, 'menu'=>'Kit\'s', 'ruta'=>'kit.report', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>3001, 'padre'=>3000, 'menu'=>'Lista', 'ruta'=>'inv.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>3002, 'padre'=>3000, 'menu'=>'Abastos y Mermas', 'ruta'=>'move.report', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>4001, 'padre'=>4000, 'menu'=>'Hacer Corte', 'ruta'=>'corte.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>4002, 'padre'=>4000, 'menu'=>'Lista', 'ruta'=>'cortes.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>4003, 'padre'=>4000, 'menu'=>'Estadistica', 'ruta'=>'estadistica.page', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>5001, 'padre'=>5000, 'menu'=>'Contratos', 'ruta'=>'contratos.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>5002, 'padre'=>5000, 'menu'=>'Tickets', 'ruta'=>'ticket.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>5003, 'padre'=>5000, 'menu'=>'Usuarios', 'ruta'=>'users.page', 'status' => 9001]);

        \DB::table('menu')->insert(['id'=>9001, 'padre'=>9000, 'menu'=>'Contratos', 'ruta'=>'con.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>9002, 'padre'=>9000, 'menu'=>'Usuarios', 'ruta'=>'user.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>9003, 'padre'=>9000, 'menu'=>'Perfil', 'ruta'=>'perfil.page', 'status' => 9001]);
        \DB::table('menu')->insert(['id'=>9004, 'padre'=>9000, 'menu'=>'Tienda', 'ruta'=>'tienda.page', 'status' => 9001]);

        // Root
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>1000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>2000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>3000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>4000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>5000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>9000]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>1001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>1002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>2001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>2002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>3001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>3002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>4001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>4002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>4003]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>5001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>5002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>5003]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>9001]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>9002]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>9003]);
        \DB::table('menu_permisos')->insert(['roles'=>1, 'menu'=>9004]);
        
        // Administrador
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>1000]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>2000]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>3000]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>4000]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>9000]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>1001]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>1002]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>2001]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>2002]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>3001]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>3002]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>4001]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>4002]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>4003]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>9002]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>9003]);
        \DB::table('menu_permisos')->insert(['roles'=>2, 'menu'=>9004]);

        //Gerente
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>1000]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>2000]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>3000]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>4000]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>9000]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>1001]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>1002]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>2001]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>2002]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>3001]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>3002]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>4001]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>4002]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>4003]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>9002]);
        \DB::table('menu_permisos')->insert(['roles'=>3, 'menu'=>9003]);

        // Cajero
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>1000]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>2000]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>3000]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>4000]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>9000]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>1001]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>1002]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>2001]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>2002]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>3001]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>3002]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>4001]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>4002]);
        \DB::table('menu_permisos')->insert(['roles'=>4, 'menu'=>9003]);

        // Inventarios
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>2000]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>3000]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>9000]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>2001]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>2002]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>3001]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>3002]);
        \DB::table('menu_permisos')->insert(['roles'=>5, 'menu'=>9003]);
    }
}
