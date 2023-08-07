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
        Schema::create('ventas_detalles', function (Blueprint $table) {
            //create
            $table->id();
            $table->string('detalle'); //descripcion del producto
            $table->decimal('original');
            $table->decimal('monto');
            $table->decimal('descuento');
            $table->decimal('cantidad');
            $table->decimal('total');
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId('user');
            $table->foreignId('venta');
            $table->foreignId('status');

            $table->index('detalle');
            
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
        Schema::table('ventas_detalles', function (Blueprint $table) {
            //
        });
    }
};
