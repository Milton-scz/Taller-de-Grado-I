<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Paquete;
use App\Models\Servicio;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Paquete::class);
            $table->foreignIdFor(Servicio::class);
            $table->integer('almacen_salida');
            $table->integer('almacen_llegada');
            $table->date('fecha_salida');
            $table->date('fecha_llegada');
            $table->decimal('peso_total',8, 2);
            $table->decimal('precio_total',8, 2);
            $table->string('codigo');
            $table->integer('estado')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guias');
    }
};
