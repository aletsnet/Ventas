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
        Schema::table('ventas_catalogos', function (Blueprint $table) {
            //create
            $table->increments('id');
            $table->string('codigo'); // codigo de barras
            $table->string('sku'); // sku => codigo de uso interno
            $table->string('nombre');
            $table->string('descripcion');
            $table->decimal('precio'); //precio por unidad
            $table->decimal('publico');
            $table->timestamps();
            $table->softDeletes();

            $table->index('codigo');
            $table->index('sku');
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('venta')->references('id')->on('ventas');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas_catalogos', function (Blueprint $table) {
            //
        });
    }
};
