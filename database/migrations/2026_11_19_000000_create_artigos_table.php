<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 120);
            $table->string('tipo', 60);
            $table->string('detalhes', 400)->nullable();
            $table->decimal('valor', 10, 2);
            $table->unsignedInteger('quantidade')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artigos');
    }
};
