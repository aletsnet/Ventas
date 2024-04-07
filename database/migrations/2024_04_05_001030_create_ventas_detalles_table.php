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
            $table->string('param'); //descripcion del producto
            $table->decimal('original');
            $table->decimal('monto');
            $table->decimal('descuento');
            $table->decimal('cantidad');
            $table->decimal('total');
            $table->unsignedBigInteger('producto_servicio')->index();
            $table->unsignedBigInteger('venta')->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('producto_servicio')->references('id')->on('productos_servicios');
            $table->foreign('venta')->references('id')->on('ventas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_detalles');
    }
};
