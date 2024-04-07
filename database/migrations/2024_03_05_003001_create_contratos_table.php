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
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('tipo')->unsigned()->nullable();
            $table->integer('estado')->unsigned()->nullable();
            $table->integer('municipio')->unsigned()->nullable();
            $table->text('param')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('nombre');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
            $table->foreign('tipo')->references('id')->on('catalogos_detalles');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('estado')->references('id')->on('estados');
            $table->foreign('municipio')->references('id')->on('municipios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
