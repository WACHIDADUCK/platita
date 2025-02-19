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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->enum('tipo', ["evento","actividad"]);
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin');
            $table->enum('accesibilidad', ["socios","publico","privado","mixto"]);
            $table->enum('estado', ["abierto","cerrado"]);
            $table->integer('aforo')->nullable();
            $table->integer('aforo_socios')->nullable();
            $table->integer('aforo_no_socios')->nullable();
            $table->integer('voluntarios')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
