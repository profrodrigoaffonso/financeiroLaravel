<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saques extends Model
{
    protected $fillable = ['banco_id', 'valor', 'data_hora'];
}
