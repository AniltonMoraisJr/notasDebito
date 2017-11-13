<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }

    public function notas(){
        return $this->hasMany('App\Nota');
    }
}
