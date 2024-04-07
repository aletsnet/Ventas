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
        Schema::create('departamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('pabre')->unsigned()->nullable();
            $table->integer('contrato')->unsigned();
            $table->integer('tienda')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('pabre')->references('id')->on('departamentos');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('tienda')->references('id')->on('tiendas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departamentos');
    }
};
