<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedores extends Model
{
    /** @use HasFactory<\Database\Factories\VendedoresFactory> */
    use HasFactory;

    protected $fillable = [
        'id_loja',
        'nome',
        'cpf',
    
    ];

    public function loja()
    {
        return $this->belongsTo(lojas::class, 'id_loja');
    }
}
