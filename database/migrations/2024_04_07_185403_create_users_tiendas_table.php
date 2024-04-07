<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users_tiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('tienda')->unsigned();
            $table->timestamps();
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('tienda')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_tiendas');
    }
};
