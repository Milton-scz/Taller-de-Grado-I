<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vertice;

class Arco extends Model
{
    protected $fillable = ['peso', 'vertice_origen_id', 'vertice_destino_id'];

    public function verticeOrigen()
    {
        return $this->belongsTo(Vertice::class, 'vertice_origen_id');
    }

    public function verticeDestino()
    {
        return $this->belongsTo(Vertice::class, 'vertice_destino_id');
    }
}
