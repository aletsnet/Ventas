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
        Schema::create('productos_servicios', function (Blueprint $table) {
            //create
            $table->id();
            $table->string('codigo'); // codigo de barras
            $table->string('sku')->nullable(); // sku => codigo de uso interno
            $table->string('foto')->nullable();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->decimal('precio'); //precio por unidad
            $table->decimal('publico')->nullable();
            $table->integer('departamento')->unsigned()->nullable();
            $table->integer('subdepartamento')->unsigned()->nullable();
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->integer('tienda')->unsigned();
            $table->integer('status')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->index('codigo');
            $table->index('sku');
            $table->index('nombre');
            $table->index('descripcion');
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('tienda')->references('id')->on('tiendas');
            $table->foreign('departamento')->references('id')->on('departamentos');
            $table->foreign('subdepartamento')->references('id')->on('departamentos');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_servicios');
    }
};
