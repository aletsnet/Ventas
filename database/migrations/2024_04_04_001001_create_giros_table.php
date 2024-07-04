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
        Schema::create('giros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('avatar')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->index('nombre');
            $table->foreign('status')->references('id')->on('catalogos_detalles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giros');
    }
};
