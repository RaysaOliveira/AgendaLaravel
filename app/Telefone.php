<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    //fillable é um array com os dados
    protected $fillable = [
        'id',
        'ddd',
        'fone',
        'pessoa_id'
    ];

    protected $table = 'telefones';
}
