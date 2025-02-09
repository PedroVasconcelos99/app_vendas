<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    /** @use HasFactory<\Database\Factories\ProdutosFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'cor',
        'valor',
    ];
}
