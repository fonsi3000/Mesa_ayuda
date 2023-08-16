<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();  // ID del ticket
            $table->unsignedBigInteger('user_id');  // ID del usuario que lo envía
            $table->bigInteger('cedula');  // Número de cédula
            $table->bigInteger('contacto');  // Número de contacto o WhatsApp
            $table->unsignedBigInteger('category_id');  // ID de la categoría
            $table->string('titulo');  // Título del ticket
            $table->text('descripcion');  // Descripción del ticket
            $table->string('documento_1')->nullable();  // Archivo de documento 1
            $table->string('documento_2')->nullable();  // Archivo de documento 2
            $table->unsignedBigInteger('agent_asignado')->nullable();
            $table->text('respuesta')->nullable();
            $table->timestamps();  // Campos created_at y updated_at
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
