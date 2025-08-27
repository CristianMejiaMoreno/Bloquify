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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->id();
            $table->string('imei')->unique();
            $table->string('marca');
            $table->string('modelo');
            $table->string('numero_serie')->unique();
            $table->enum('estado_condicion', ['nuevo', 'usado', 'reacondicionado'])->default('nuevo');
            $table->enum('estado_uso', ['disponible', 'asignado', 'bloqueado', 'mantenimiento'])->default('disponible');
            $table->string('foto_url')->nullable();
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dispositivos');
    }
};
