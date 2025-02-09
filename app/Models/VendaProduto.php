<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
    protected $fillable = [
        'id_venda',
        'id_produto',
        'quantidade',
        'total',
    ];
}
