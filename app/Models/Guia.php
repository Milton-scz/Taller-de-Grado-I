<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function paquete(){
        return $this->belongsTo(Paquete::class);
    }

    public function almacenSalida()
    {
        return $this->belongsTo(Almacen::class, 'almacen_salida');
    }

    public function almacenLlegada()
    {
        return $this->belongsTo(Almacen::class, 'almacen_llegada');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function ruta_rastreo(){
        return $this->hasMany(Ruta_Rastreo::class, 'guia_id', 'id');
    }
}
