<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bancos extends Model
{
    protected $fillable = ['codigo', 'nome', 'agencia', 'conta', 'correntista'];
}
