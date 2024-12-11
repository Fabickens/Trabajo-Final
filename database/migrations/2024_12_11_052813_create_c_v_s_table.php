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
        Schema::create('cvs', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('user_id'); // Relación con la tabla de usuarios
            $table->string('name'); // Nombre del usuario
            $table->string('email'); // Correo electrónico
            $table->text('education'); // Campo para educación
            $table->text('experience'); // Campo para experiencia laboral
            $table->text('skills'); // Campo para habilidades
            $table->text('languages'); // Campo para idiomas
            $table->timestamps(); // Timestamps (created_at, updated_at)

            // Clave foránea para enlazar con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs'); // Nombre correcto de la tabla
    }
};
