<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function vertices()
    {
        return $this->hasMany(Vertice::class);
    }
}
