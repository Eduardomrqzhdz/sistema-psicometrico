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
        Schema::create('pregunta', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta',130);
            $table->unsignedBigInteger('id_prueba');
            $table->integer('tipoPregunta')->nullable();


            /*
             $table->foreign('id_prueba')
                ->references('id')
                ->on('prueba');
             * */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pregunta');
    }
};
