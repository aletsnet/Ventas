<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersContrato extends Model
{
    use HasFactory;

    public function Contrato()
    {
        return $this->belongsTo('App\Models\contratos', 'contrato');
    }

    public function User()
    {
        return $this->belongsTo('App\Models\User', 'user');
    }
}
