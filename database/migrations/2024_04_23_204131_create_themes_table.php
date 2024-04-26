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
        Schema::create('themes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->text('head')->nullable();
            $table->text('body')->nullable();
            $table->text('foot')->nullable();
            $table->text('script')->nullable();
            $table->string('pack')->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('themes');
    }
};
