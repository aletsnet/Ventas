<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersTiendas extends Model
{
    use HasFactory;

    public function Contrato()
    {
        return $this->belongsTo('App\Models\Contratos', 'contrato');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }

    public function Tienda()
    {
        return $this->belongsTo('App\Models\Tiendas', 'tienda');
    }
}
