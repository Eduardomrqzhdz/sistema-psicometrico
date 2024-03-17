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
        Schema::create('prueba', function (Blueprint $table) {
            $table->id();
            $table->string('prueba',90);
            $table->integer('cant_preguntas');
            $table->string('descripcion',255);
            $table->date('fecha_creacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prueba');
    }
};
