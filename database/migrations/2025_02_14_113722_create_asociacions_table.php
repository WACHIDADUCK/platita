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
        Schema::create('asociacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable(false);
            $table->string('descripcion')->nullable(false);
            $table->string('contacto')->nullable(false);
            $table->string('email')->nullable(false);
            $table->string('imagen');
            $table->foreignId('gestor_id')->constrained('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociacions');
    }
};
