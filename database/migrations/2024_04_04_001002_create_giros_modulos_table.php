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
        Schema::create('giros_modulos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giro')->unsigned()->nullable();
            $table->integer('rol')->unsigned()->nullable();
            $table->integer('menu')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('giro')->references('id')->on('giros');
            $table->foreign('rol')->references('id')->on('roles');
            $table->foreign('menu')->references('id')->on('menu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giros_modulos');
    }
};
