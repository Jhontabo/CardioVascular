<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('habitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con usuario
            $table->integer('actividad_fisica')->default(0); // Minutos por semana
            $table->float('horas_suenio')->default(0); // Horas promedio de sueño por día
            $table->integer('hidratacion')->default(0); // Vasos de agua al día
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('habitos');
    }
};
