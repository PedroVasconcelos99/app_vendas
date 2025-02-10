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
use Illuminate\Http\Request;

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
        ], [
            'cliente_id.exists' => 'O cliente informado não existe.',
            'loja_id.exists' => 'A loja informada não existe.',
            'vendedor_id.exists' => 'O vendedor informado não existe.',
            'data_venda.date' => 'A data da venda deve ser uma data válida.',
            'valor_total.numeric' => 'O valor total deve ser um número.',
            'forma_pagamento.in' => 'A forma de pagamento informada é inválida.',
            'produtos.required' => 'É necessário informar ao menos um produto.',
            'produtos.*.quantidade.min' => 'A quantidade mínima de um produto é 1.',
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
        
        return redirect()->route('vendas.index')->with('success', 'Venda cadastrada com sucesso!');
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
    public function edit(Vendas $venda)
    {
        $clientes = Clientes::all();
        $lojas = lojas::all();
        $vendedores = Vendedores::all();
        $produtos = Produtos::all();
        $vendaProdutos = VendaProduto::where('id_venda', $venda->id)->get();
        // dd($vendaProdutos);
        return view('vendas.editar', compact('venda', 'clientes', 'lojas', 'vendedores', 'produtos', 'vendaProdutos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendasRequest $request, Vendas $venda)
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
        ], [
            'cliente_id.exists' => 'O cliente informado não existe.',
            'loja_id.exists' => 'A loja informada não existe.',
            'vendedor_id.exists' => 'O vendedor informado não existe.',
            'data_venda.date' => 'A data da venda deve ser uma data válida.',
            'valor_total.numeric' => 'O valor total deve ser um número.',
            'forma_pagamento.in' => 'A forma de pagamento informada é inválida.',
            'produtos.required' => 'É necessário informar ao menos um produto.',
            'produtos.*.quantidade.min' => 'A quantidade mínima de um produto é 1.',
        ]);
    
        $venda->update($fields);
    
       
        VendaProduto::where('id_venda', $venda->id)->delete();
    
      
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
    
        return redirect()->route('vendas.index')->with('success', 'Venda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendas $venda)
    {
            
        VendaProduto::where('id_venda', $venda->id)->delete();

        
        $venda->delete();

        return redirect()->route('vendas.index')->with('success', 'Venda excluída com sucesso!')->with('success', 'Venda excluída com sucesso!');
    }

    /**
     *  Exibindo relatório de vendas
     */
    public function relatorio(Request $request)
    {
        $clientes = Clientes::all();
        $lojas = lojas::all();
        $vendedores = Vendedores::all();
    
        $query = Vendas::query();
    
        if ($request->filled('data_inicio') && $request->filled('data_fim')) {
            $query->whereBetween('data_venda', [$request->data_inicio, $request->data_fim]);
        }
    
        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', $request->cliente_id);
        }
    
        if ($request->filled('loja_id')) {
            $query->where('loja_id', $request->loja_id);
        }
    
        if ($request->filled('vendedor_id')) {
            $query->where('vendedor_id', $request->vendedor_id);
        }
    
        $vendas = $query->get();
    
        return view('vendas.relatorio', compact('vendas', 'clientes', 'lojas', 'vendedores'));
    }
}
