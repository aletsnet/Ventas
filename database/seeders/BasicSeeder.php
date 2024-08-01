<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BasicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        \DB::table('users')->insert(['id'=> 2,'avatar'=>'default/avatar.png', 'name'=>'usuario demo','email'=>'aletsnet@hotmail.com','password'=> \Hash::make('qwaszx12'),'rol' => 2]);
        \DB::table('contratos')->insert(['id'=>1, 'nombre'=>'demo', 'telefono'=> '-','user'=>2, 'status' => 1001, 'tipo' => 7001,'estado'=>13]);
        \DB::table('tiendas')->insert(['id'=>1, 'nombre'=>'Teinda demo', 'contrato'=>1]);
        \DB::table('users_contratos')->insert(['user'=>2, 'contrato' => 1]);

        \DB::table('departamentos')->insert(['id'=>3, 'nombre'=>'BEBIDAS', 'contrato'=>1, 'tienda' => 1]);
        \DB::table('departamentos')->insert(['id'=>8, 'nombre'=>'HAMBURGUESA', 'contrato'=>1, 'tienda' => 1]);
        \DB::table('departamentos')->insert(['id'=>9, 'nombre'=>'HELADOS ', 'contrato'=>1, 'tienda' => 1]);

        \DB::table('productos_servicios')->insert(['codigo'=>'7501130935536', 'nombre'=>'SOLERO PARADISE','publico'=>20, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130901050', 'nombre'=>'Mordisko vainilla','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413375', 'nombre'=>'Magnum clasica','publico'=>27, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130921522', 'nombre'=>'Magnum almendras','publico'=>29, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130930449', 'nombre'=>'Cornetto chocollage','publico'=>24, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130900411', 'nombre'=>'Solero chemisse','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130935512', 'nombre'=>'Solero lim�n','publico'=>11, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130932498', 'nombre'=>'Micha fresa','publico'=>35, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130932504', 'nombre'=>'Micha vainilla','publico'=>35, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130933013', 'nombre'=>'MICHA LIMON','publico'=>32, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130932511', 'nombre'=>'Micha napolitano','publico'=>35, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902309', 'nombre'=>'LITRO DE VAINILLA','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902101', 'nombre'=>'LITRO  CHOCOCHIPS','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902194', 'nombre'=>'LITRO NAPOLITANO','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902149', 'nombre'=>'LITRO NUEZ Y ALMENDRAS','publico'=>50, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130905515', 'nombre'=>'LITRO COCO','publico'=>50, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902118', 'nombre'=>'LITRO FRESA','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130903245', 'nombre'=>'MICHA OREO','publico'=>51, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130903153', 'nombre'=>'LITRO OREO','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902170', 'nombre'=>'LITRO DE CAPUCHINO','publico'=>51, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130906406', 'nombre'=>'Litro de lim�n','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934072', 'nombre'=>'CASERO DE FRESA','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130935017', 'nombre'=>'Litro Fresa','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130902095', 'nombre'=>'LITRO CHOCOLATE','publico'=>55, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934003', 'nombre'=>'COPA CORNETTO VAINILLA','publico'=>23, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934058', 'nombre'=>'Kolorix','publico'=>6, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934065', 'nombre'=>'CASERO DE COCO','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934973', 'nombre'=>'Chococrem fresa','publico'=>14, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934980', 'nombre'=>'Chococrem chocolate','publico'=>14, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934669', 'nombre'=>'Minichoc','publico'=>10, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130935635', 'nombre'=>'ACIDIX FRESA','publico'=>7, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130935475', 'nombre'=>'LITRO QUESO CON ZARZAMORA','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306400122', 'nombre'=>'CASERO YOGO','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306400214', 'nombre'=>'DINOBOOM','publico'=>9, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306412309', 'nombre'=>'CASERO MANGO YOGO','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306412354', 'nombre'=>'Apolo pinta lengua','publico'=>10, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306412705', 'nombre'=>'HERSEYS','publico'=>10, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413054', 'nombre'=>'Solero Paradise frutos rojos','publico'=>23, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413016', 'nombre'=>'Pelon pelo rico','publico'=>11, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413023', 'nombre'=>'SPLASH','publico'=>10, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413009', 'nombre'=>'Cornetto oreo','publico'=>26, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413399', 'nombre'=>'MAGNUM YOGHURT','publico'=>28, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413177', 'nombre'=>'MORDISKO BROWNIE','publico'=>17, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414525', 'nombre'=>'Solero mousse lim�n','publico'=>21, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413320', 'nombre'=>'Magnum cookies and cream','publico'=>30, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414556', 'nombre'=>'Bubbaloo','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413146', 'nombre'=>'LITRO DE YOGURT CON MANGO','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306413481', 'nombre'=>'LITRO DE MORDISKO','publico'=>79, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130933297', 'nombre'=>'LITRO MMS','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501130934577', 'nombre'=>'LITRO DE KISSES','publico'=>74, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414747', 'nombre'=>'RASPATITO','publico'=>10, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414952', 'nombre'=>'Artesanal fresa','publico'=>19, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415010', 'nombre'=>'Magnum praline','publico'=>30, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414907', 'nombre'=>'Cornetto Hersheys','publico'=>26, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414761', 'nombre'=>'MICHA MORDISKO','publico'=>46, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414945', 'nombre'=>'Artesanal mango','publico'=>19, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414969', 'nombre'=>'Artesanal coco','publico'=>19, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7501055335978', 'nombre'=>'JUGUITO','publico'=>7, 'departamento' => 3, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415423', 'nombre'=>'Mordisko chocoavellana','publico'=>16, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415287', 'nombre'=>'Magnum doble caramelo','publico'=>35, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415294', 'nombre'=>'Magnum doble chocolate','publico'=>35, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415560', 'nombre'=>'Distroller','publico'=>15, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306415454', 'nombre'=>'Viennetta','publico'=>85, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506306414471', 'nombre'=>'Copa cornetto Brownie y vainilla','publico'=>26, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);
        \DB::table('productos_servicios')->insert(['codigo'=>'7506174510695', 'nombre'=>'TWIX','publico'=>26, 'departamento' => 9, 'contrato'=>1, 'tienda'=> 1, 'status' => 3001]);

    }
}
