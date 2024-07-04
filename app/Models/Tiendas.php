<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiendas extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\CatalogosDetalles', 'status');
    }

    public function Giro()
    {
        return $this->belongsTo('App\Models\Giros', 'giro');
    }

    public function Estado()
    {
        return $this->belongsTo('App\Models\Estados', 'estado');
    }

    public function Municipio()
    {
        return $this->belongsTo('App\Models\Municipios', 'municipio');
    }
}
