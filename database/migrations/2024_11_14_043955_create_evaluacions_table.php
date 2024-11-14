<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con la tabla `users`
            $table->integer('edad')->nullable();
            $table->float('peso')->nullable();
            $table->float('altura')->nullable();
            $table->integer('sistolica')->nullable();
            $table->integer('diastolica')->nullable();
            $table->float('colesterol')->nullable();
            $table->boolean('antecedentes')->default(false);
            $table->timestamps();
        });


    }

    public function down(): void
    {
        Schema::dropIfExists('evaluaciones');
    }
};
