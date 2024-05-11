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
        Schema::create('arcos', function (Blueprint $table) {
            $table->id();
            $table->float('peso');
            $table->foreignId('vertice_origen_id')->constrained('vertices')->onDelete('cascade');
            $table->foreignId('vertice_destino_id')->constrained('vertices')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arcos');
    }
};
