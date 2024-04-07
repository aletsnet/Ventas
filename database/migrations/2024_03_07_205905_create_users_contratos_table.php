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
        Schema::create('users_contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user')->nullable()->index();
            $table->integer('contrato')->unsigned();
            $table->timestamps();
            
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('contrato')->references('id')->on('contratos');
        });
    }   


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_contratos');
    }
};
