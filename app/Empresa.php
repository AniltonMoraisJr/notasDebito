<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome','cpf_cnpj', 'cep', 
        'endereco', 'numero', 'bairro', 'cidade',
        'estado', 'img_url'
    ];

    public function notas(){
        return $this->hasMany('App\Nota');
    }
}
