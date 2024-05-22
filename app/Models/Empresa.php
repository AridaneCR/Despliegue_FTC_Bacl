<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'descripcion', 'nombre', 'nif', 'telefono', 'email', 'estado', 'servicio', 'horario'
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function cuota()
    {
        return $this->belongsTo(Cuota::class);
    }

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }
}
