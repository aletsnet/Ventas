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
        Schema::create('ventas', function (Blueprint $table) {
            //create
            $table->id();
            $table->string('detalle')->nullable();
            $table->dateTime('apertura')->nullable();
            $table->dateTime('cierre')->nullable();
            $table->decimal('total')->nullable();
            $table->decimal('descuento')->nullable();
            
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->integer('tienda')->unsigned();

            $table->unsignedBigInteger('sesion')->nullable()->index();
            $table->integer('modo_pago')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->index('detalle');
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('tienda')->references('id')->on('tiendas');
            $table->foreign('sesion')->references('id')->on('sesiones_ventas');
            $table->foreign('modo_pago')->references('id')->on('catalogos_detalles');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
};
