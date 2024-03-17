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
        Schema::table('users', function (Blueprint $table) {

            $table->foreign('id_sexo')
                ->references('id')
                ->on('sexo');

            $table->foreign('id_oficio')
                ->references('id')
                ->on('oficio');

            $table->foreign('id_carrera')
                ->references('id')
                ->on('carrera');

            $table->foreign('id_region')
                ->references('id')
                ->on('region');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['id_sexo']);
            $table->dropForeign(['id_oficio']);
            $table->dropForeign(['id_carrera']);
            $table->dropForeign(['id_region']);
        });
    }
};
