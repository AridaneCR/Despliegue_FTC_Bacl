<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'descripcion', 'titulo', 'estado', 'fecha_hora'
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
