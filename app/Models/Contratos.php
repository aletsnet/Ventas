<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contratos extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * $table->foreign('status')->references('id')->on('catalogos_detalles');
     * $table->foreign('tipo')->references('id')->on('catalogos_detalles');
     * $table->foreign('user')->references('id')->on('users');
     * $table->foreign('estado')->references('id')->on('estados');
     * $table->foreign('municipio')->references('id')->on('municipios');
     */

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }

    public function Status()
    {
        return $this->belongsTo('App\Models\CatalogosDetalles', 'status');
    }

    public function Tipo()
    {
        return $this->belongsTo('App\Models\CatalogosDetalles', 'tipo');
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
