<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Categorias;

class Pagamentos extends Model
{
    protected $fillable = ['categoria_id', 'forma_pagamento_id', 'valor', 'data_hora', 'tipo', 'obs'];

    public function categorias(){

        return $this->hasMany(Categorias::class, 'categoria_id', 'id');

    }
}
