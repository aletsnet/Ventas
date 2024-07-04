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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono')->nullable();
            $table->string('logo')->nullable();
            $table->string('direccion')->nullable();
            $table->string('ticket_head')->nullable();
            $table->string('ticket_foot')->nullable();
            $table->string('ticket_css')->nullable();
            $table->boolean('sesion_compartido')->default(false);
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->integer('giro')->unsigned()->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('estado')->unsigned()->nullable();
            $table->integer('municipio')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('nombre');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
            $table->foreign('giro')->references('id')->on('giros');
            $table->foreign('contrato')->references('id')->on('contratos');
            $table->foreign('estado')->references('id')->on('estados');
            $table->foreign('municipio')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiendas');
    }
};
