<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = ['empresa_id', 'sala_id','title', 'start', 'end'];

    // Definir relación con la tabla empresas
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Definir relación con la tabla salas
    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }
}
