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
        Schema::disableForeignKeyConstraints();

        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained();
            $table->foreignId('usuario_id')->constrained('users');
            $table->string('comentario');
            $table->dateTime('fecha');
            $table->integer('valoracion');
            $table->foreignId('user_id');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentarios');
    }
};
