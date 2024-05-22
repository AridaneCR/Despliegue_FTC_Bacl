<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $fillable = [
        'inventario', 'importe', 'numero', 'ubicacion', 'numero_red'
    ];

    public function empresas()
    {
        return $this->belongsToMany(Empresa::class);
    }
}
