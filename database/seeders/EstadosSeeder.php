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
        \DB::table('estados')->insert(['code'=>'AGU', 'pais'=>'MEX','nombre'=>'Aguascalientes']);
        \DB::table('estados')->insert(['code'=>'BCN', 'pais'=>'MEX','nombre'=>'Baja California']);
        \DB::table('estados')->insert(['code'=>'BCS', 'pais'=>'MEX','nombre'=>'Baja California Sur']);
        \DB::table('estados')->insert(['code'=>'CAM', 'pais'=>'MEX','nombre'=>'Campeche']);
        \DB::table('estados')->insert(['code'=>'CHP', 'pais'=>'MEX','nombre'=>'Chiapas']);
        \DB::table('estados')->insert(['code'=>'CHH', 'pais'=>'MEX','nombre'=>'Chihuahua']);
        \DB::table('estados')->insert(['code'=>'COA', 'pais'=>'MEX','nombre'=>'Coahuila']);
        \DB::table('estados')->insert(['code'=>'COL', 'pais'=>'MEX','nombre'=>'Colima']);
        \DB::table('estados')->insert(['code'=>'DIF', 'pais'=>'MEX','nombre'=>'Ciudad de México']);
        \DB::table('estados')->insert(['code'=>'DUR', 'pais'=>'MEX','nombre'=>'Durango']);
        \DB::table('estados')->insert(['code'=>'GUA', 'pais'=>'MEX','nombre'=>'Guanajuato']);
        \DB::table('estados')->insert(['code'=>'GRO', 'pais'=>'MEX','nombre'=>'Guerrero']);
        \DB::table('estados')->insert(['code'=>'HID', 'pais'=>'MEX','nombre'=>'Hidalgo']);
        \DB::table('estados')->insert(['code'=>'JAL', 'pais'=>'MEX','nombre'=>'Jalisco']);
        \DB::table('estados')->insert(['code'=>'MEX', 'pais'=>'MEX','nombre'=>'Estado de México']);
        \DB::table('estados')->insert(['code'=>'MIC', 'pais'=>'MEX','nombre'=>'Michoacán']);
        \DB::table('estados')->insert(['code'=>'MOR', 'pais'=>'MEX','nombre'=>'Morelos']);
        \DB::table('estados')->insert(['code'=>'NAY', 'pais'=>'MEX','nombre'=>'Nayarit']);
        \DB::table('estados')->insert(['code'=>'NLE', 'pais'=>'MEX','nombre'=>'Nuevo León']);
        \DB::table('estados')->insert(['code'=>'OAX', 'pais'=>'MEX','nombre'=>'Oaxaca']);
        \DB::table('estados')->insert(['code'=>'PUE', 'pais'=>'MEX','nombre'=>'Puebla']);
        \DB::table('estados')->insert(['code'=>'QUE', 'pais'=>'MEX','nombre'=>'Querétaro']);
        \DB::table('estados')->insert(['code'=>'ROO', 'pais'=>'MEX','nombre'=>'Quintana Roo']);
        \DB::table('estados')->insert(['code'=>'SLP', 'pais'=>'MEX','nombre'=>'San Luis Potosí']);
        \DB::table('estados')->insert(['code'=>'SIN', 'pais'=>'MEX','nombre'=>'Sinaloa']);
        \DB::table('estados')->insert(['code'=>'SON', 'pais'=>'MEX','nombre'=>'Sonora']);
        \DB::table('estados')->insert(['code'=>'TAB', 'pais'=>'MEX','nombre'=>'Tabasco']);
        \DB::table('estados')->insert(['code'=>'TAM', 'pais'=>'MEX','nombre'=>'Tamaulipas']);
        \DB::table('estados')->insert(['code'=>'TLA', 'pais'=>'MEX','nombre'=>'Tlaxcala']);
        \DB::table('estados')->insert(['code'=>'VER', 'pais'=>'MEX','nombre'=>'Veracruz']);
        \DB::table('estados')->insert(['code'=>'YUC', 'pais'=>'MEX','nombre'=>'Yucatán']);
        \DB::table('estados')->insert(['code'=>'ZAC', 'pais'=>'MEX','nombre'=>'Zacatecas']);
        \DB::table('estados')->insert(['code'=>'AL', 'pais'=>'USA','nombre'=>'Alabama']);
        \DB::table('estados')->insert(['code'=>'AK', 'pais'=>'USA','nombre'=>'Alaska']);
        \DB::table('estados')->insert(['code'=>'AZ', 'pais'=>'USA','nombre'=>'Arizona']);
        \DB::table('estados')->insert(['code'=>'AR', 'pais'=>'USA','nombre'=>'Arkansas']);
        \DB::table('estados')->insert(['code'=>'CA', 'pais'=>'USA','nombre'=>'California']);
        \DB::table('estados')->insert(['code'=>'NC', 'pais'=>'USA','nombre'=>'Carolina del Norte']);
        \DB::table('estados')->insert(['code'=>'SC', 'pais'=>'USA','nombre'=>'Carolina del Sur']);
        \DB::table('estados')->insert(['code'=>'CO', 'pais'=>'USA','nombre'=>'Colorado']);
        \DB::table('estados')->insert(['code'=>'CT', 'pais'=>'USA','nombre'=>'Connecticut']);
        \DB::table('estados')->insert(['code'=>'ND', 'pais'=>'USA','nombre'=>'Dakota del Norte']);
        \DB::table('estados')->insert(['code'=>'SD', 'pais'=>'USA','nombre'=>'Dakota del Sur']);
        \DB::table('estados')->insert(['code'=>'DE', 'pais'=>'USA','nombre'=>'Delaware']);
        \DB::table('estados')->insert(['code'=>'FL', 'pais'=>'USA','nombre'=>'Florida']);
        \DB::table('estados')->insert(['code'=>'GA', 'pais'=>'USA','nombre'=>'Georgia']);
        \DB::table('estados')->insert(['code'=>'HI', 'pais'=>'USA','nombre'=>'Hawái']);
        \DB::table('estados')->insert(['code'=>'ID', 'pais'=>'USA','nombre'=>'Idaho']);
        \DB::table('estados')->insert(['code'=>'IL', 'pais'=>'USA','nombre'=>'Illinois']);
        \DB::table('estados')->insert(['code'=>'IN', 'pais'=>'USA','nombre'=>'Indiana']);
        \DB::table('estados')->insert(['code'=>'IA', 'pais'=>'USA','nombre'=>'Iowa']);
        \DB::table('estados')->insert(['code'=>'KS', 'pais'=>'USA','nombre'=>'Kansas']);
        \DB::table('estados')->insert(['code'=>'KY', 'pais'=>'USA','nombre'=>'Kentucky']);
        \DB::table('estados')->insert(['code'=>'LA', 'pais'=>'USA','nombre'=>'Luisiana']);
        \DB::table('estados')->insert(['code'=>'ME', 'pais'=>'USA','nombre'=>'Maine']);
        \DB::table('estados')->insert(['code'=>'MD', 'pais'=>'USA','nombre'=>'Maryland']);
        \DB::table('estados')->insert(['code'=>'MA', 'pais'=>'USA','nombre'=>'Massachusetts']);
        \DB::table('estados')->insert(['code'=>'MI', 'pais'=>'USA','nombre'=>'Míchigan']);
        \DB::table('estados')->insert(['code'=>'MN', 'pais'=>'USA','nombre'=>'Minnesota']);
        \DB::table('estados')->insert(['code'=>'MS', 'pais'=>'USA','nombre'=>'Misisipi']);
        \DB::table('estados')->insert(['code'=>'MO', 'pais'=>'USA','nombre'=>'Misuri']);
        \DB::table('estados')->insert(['code'=>'MT', 'pais'=>'USA','nombre'=>'Montana']);
        \DB::table('estados')->insert(['code'=>'NE', 'pais'=>'USA','nombre'=>'Nebraska']);
        \DB::table('estados')->insert(['code'=>'NV', 'pais'=>'USA','nombre'=>'Nevada']);
        \DB::table('estados')->insert(['code'=>'NJ', 'pais'=>'USA','nombre'=>'Nueva Jersey']);
        \DB::table('estados')->insert(['code'=>'NY', 'pais'=>'USA','nombre'=>'Nueva York']);
        \DB::table('estados')->insert(['code'=>'NH', 'pais'=>'USA','nombre'=>'Nuevo Hampshire']);
        \DB::table('estados')->insert(['code'=>'NM', 'pais'=>'USA','nombre'=>'Nuevo México']);
        \DB::table('estados')->insert(['code'=>'OH', 'pais'=>'USA','nombre'=>'Ohio']);
        \DB::table('estados')->insert(['code'=>'OK', 'pais'=>'USA','nombre'=>'Oklahoma']);
        \DB::table('estados')->insert(['code'=>'OR', 'pais'=>'USA','nombre'=>'Oregón']);
        \DB::table('estados')->insert(['code'=>'PA', 'pais'=>'USA','nombre'=>'Pensilvania']);
        \DB::table('estados')->insert(['code'=>'RI', 'pais'=>'USA','nombre'=>'Rhode Island']);
        \DB::table('estados')->insert(['code'=>'TN', 'pais'=>'USA','nombre'=>'Tennessee']);
        \DB::table('estados')->insert(['code'=>'TX', 'pais'=>'USA','nombre'=>'Texas']);
        \DB::table('estados')->insert(['code'=>'UT', 'pais'=>'USA','nombre'=>'Utah']);
        \DB::table('estados')->insert(['code'=>'VT', 'pais'=>'USA','nombre'=>'Vermont']);
        \DB::table('estados')->insert(['code'=>'VA', 'pais'=>'USA','nombre'=>'Virginia']);
        \DB::table('estados')->insert(['code'=>'WV', 'pais'=>'USA','nombre'=>'Virginia Occidental']);
        \DB::table('estados')->insert(['code'=>'WA', 'pais'=>'USA','nombre'=>'Washington']);
        \DB::table('estados')->insert(['code'=>'WI', 'pais'=>'USA','nombre'=>'Wisconsin']);
        \DB::table('estados')->insert(['code'=>'WY', 'pais'=>'USA','nombre'=>'Wyoming']);
        \DB::table('estados')->insert(['code'=>'ON', 'pais'=>'CAN','nombre'=>'Ontario ']);
        \DB::table('estados')->insert(['code'=>'QC', 'pais'=>'CAN','nombre'=>' Quebec ']);
        \DB::table('estados')->insert(['code'=>'NS', 'pais'=>'CAN','nombre'=>' Nueva Escocia']);
        \DB::table('estados')->insert(['code'=>'NB', 'pais'=>'CAN','nombre'=>'Nuevo Brunswick ']);
        \DB::table('estados')->insert(['code'=>'MB', 'pais'=>'CAN','nombre'=>' Manitoba']);
        \DB::table('estados')->insert(['code'=>'BC', 'pais'=>'CAN','nombre'=>' Columbia Británica']);
        \DB::table('estados')->insert(['code'=>'PE', 'pais'=>'CAN','nombre'=>' Isla del Príncipe Eduardo']);
        \DB::table('estados')->insert(['code'=>'SK', 'pais'=>'CAN','nombre'=>' Saskatchewan']);
        \DB::table('estados')->insert(['code'=>'AB', 'pais'=>'CAN','nombre'=>' Alberta']);
        \DB::table('estados')->insert(['code'=>'NL', 'pais'=>'CAN','nombre'=>' Terranova y Labrador']);
        \DB::table('estados')->insert(['code'=>'NT', 'pais'=>'CAN','nombre'=>' Territorios del Noroeste']);
        \DB::table('estados')->insert(['code'=>'YT', 'pais'=>'CAN','nombre'=>' Yukón']);
        \DB::table('estados')->insert(['code'=>'UN', 'pais'=>'CAN','nombre'=>' Nunavut']);

    }
}
