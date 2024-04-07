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
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->string('param'); //espacio reservado para integracion con otras plataformas
            $table->decimal('stock');
            $table->decimal('stock_min');
            $table->decimal('stock_max');
            $table->unsignedBigInteger('producto_servicio')->index();
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->integer('tienda')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->index('param');

            $table->foreign('producto_servicio')->references('id')->on('productos_servicios');
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
        Schema::table('inventarios', function (Blueprint $table) {
            //
        });
    }
};
