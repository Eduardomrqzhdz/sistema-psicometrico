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
        Schema::table('respuestas', function (Blueprint $table) {
            //
            $table->foreign('id_pregunta')
                ->references('id')
                ->on('pregunta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuestas', function (Blueprint $table) {
            //
        });
    }
};
