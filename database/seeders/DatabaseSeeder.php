<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::table('users')->insert(['avatar'=>'vendor/adminlte/dist/img/avatar.png',
                                     'name'=>'Administrador',
                                     'email'=>'admin@web.com',
                                     'password'=> \Hash::make('qwaszx12'),
                                     'rol' => 1
                                    ]);
    }
}
