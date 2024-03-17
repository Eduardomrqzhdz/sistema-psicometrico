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
        Schema::table('resultados', function (Blueprint $table) {
            //
            $table->foreign('id_usuario')
                ->references('id')
                ->on('users');

            $table->foreign('id_prueba')
                ->references('id')
                ->on('prueba');

            $table->date('fecha_resulto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resultados', function (Blueprint $table) {
            //
        });
    }
};
