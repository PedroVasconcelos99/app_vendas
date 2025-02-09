<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    /** @use HasFactory<\Database\Factories\VendasFactory> */
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'loja_id',
        'vendedor_id',
        'data_venda',
        'valor_total',
        'observacao',
        'forma_pagamento',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function loja()
    {
        return $this->belongsTo(lojas::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedores::class);
    }
}
