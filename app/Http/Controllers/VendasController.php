<?php

namespace App\Http\Controllers;

use App\Models\Vendas;
use App\Http\Requests\StoreVendasRequest;
use App\Http\Requests\UpdateVendasRequest;
use App\Models\Clientes;
use App\Models\lojas;
use App\Models\Produtos;
use App\Models\VendaProduto;
use App\Models\Vendedores;

class VendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vendas.index', [
            'vendas' => Vendas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Clientes::all();
        $lojas = lojas::all();
        $vendedores = Vendedores::all();
        $produtos = Produtos::all();
        return view('vendas.cadastrar_venda', compact('clientes', 'lojas', 'vendedores', 'produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendasRequest $request)
    {
        $fields = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'loja_id' => ['required', 'exists:lojas,id'],
            'vendedor_id' => ['required', 'exists:vendedores,id'],
            'data_venda' => ['required', 'date'],
            'valor_total' => ['required', 'numeric'],
            'observacao' => ['nullable', 'string'],
            'forma_pagamento' => ['required', 'in:Dinheiro,Crédito,Débito'],
            'produtos' => ['required', 'array'],
            'produtos.*.id' => ['required', 'exists:produtos,id'],
            'produtos.*.quantidade' => ['required', 'integer', 'min:1'],
        ]);
    
        $venda = Vendas::create($fields);
        // dd($venda);
        foreach ($fields['produtos'] as $produto) {
            $produtoModel = Produtos::find($produto['id']);
            $total = $produtoModel->valor * $produto['quantidade'];
    
            VendaProduto::create([
                'id_venda' => $venda->id,
                'id_produto' => $produto['id'],
                'quantidade' => $produto['quantidade'],
                'total' => $total,
            ]);
        }
        
        return redirect()->route('vendas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendas $vendas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendas $vendas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendasRequest $request, Vendas $vendas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendas $vendas)
    {
        //
    }
}
