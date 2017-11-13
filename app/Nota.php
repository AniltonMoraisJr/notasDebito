<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //

    public function projeto()
    {
        return $this->belongsTo('App\Projeto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function empresa()
    {
        return $this->belongsTo('App\Empresa');
    }
}
