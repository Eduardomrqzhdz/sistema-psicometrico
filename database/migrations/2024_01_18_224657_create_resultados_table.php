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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->integer('puntaje_total');
            $table->integer('resuelto');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_prueba');

            $table->integer('puntajeDirecto')->nullable();
            $table->integer('puntajeIndirecto')->nullable();

            /*
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users');

            $table->foreign('id_prueba')
                ->references('id')
                ->on('prueba');
            $table->date('fecha_resulto');
              */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
