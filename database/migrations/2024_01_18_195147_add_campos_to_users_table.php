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
            //
            $table->integer('rol')->default(1); //1 = administrador 2 = usuario
            $table->date('fecha_nacimiento')->nullable();

            $table->unsignedBigInteger('id_sexo')->default(1);
            $table->unsignedBigInteger('id_oficio')->default(1);
            $table->unsignedBigInteger('id_carrera')->default(1);
            $table->unsignedBigInteger('id_region')->default(1);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('rol');
            $table->dropColumn('id_sexo');
            $table->dropColumn('id_oficio');
            $table->dropColumn('id_carrera');
            $table->dropColumn('id_region');


        });
    }
};
