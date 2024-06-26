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
        Schema::create('sesiones_ventas', function (Blueprint $table) {
            //
            $table->id();
            $table->dateTime('apertura');
            $table->dateTime('cierre')->nullable();
            $table->decimal('inicio')->nullable();
            $table->decimal('entradas')->nullable();
            $table->decimal('salidas')->nullable();
            $table->decimal('total')->nullable();
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->integer('tienda')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('tienda')->references('id')->on('tiendas');
            $table->foreign('status')->references('id')->on('catalogos_detalles');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesiones_venta');
    }
};
