<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lojas extends Model
{
    /** @use HasFactory<\Database\Factories\LojasFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'cnpj',
        'cep',
        'endereco',
        'bairro',
        'cidade',
        'uf',
    ];
}
