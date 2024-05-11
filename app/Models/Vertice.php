<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Arco;

class Vertice extends Model
{
    protected $fillable = ['nombre', 'marcado'];


    public function ruta()
    {
        return $this->belongsTo(Ruta::class);
    }


   public function arcosSalientes()
    {
        return $this->hasMany(Arco::class, 'vertice_origen_id');
    }

    public function arcosEntrantes()
    {
        return $this->hasMany(Arco::class, 'vertice_destino_id');
    }


    public function desmarcar()
    {
        $this->update(['marcado' => false]);
    }

    public function marcar()
    {
        $this->update(['marcado' => true]);
    }


}
