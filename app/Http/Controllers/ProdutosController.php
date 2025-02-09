<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Http\Requests\StoreProdutosRequest;
use App\Http\Requests\UpdateProdutosRequest;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('produtos.index', [
            'produtos' => Produtos::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.cadastrar_produto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdutosRequest $request)
    {
        $fields = $request->validate([
            'nome' => ['required','string'],
            'cor' => ['required','string'],
            'valor' => ['required', 'numeric'],
        ]);
        // dd($fields);
        Produtos::create($fields);

        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produtos $produto)
    {
        return view('produtos.editar', [
            'produto' => $produto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdutosRequest $request, Produtos $produto)
    {
        $fields = $request->validate([
            'nome' => 'required|string|max:255',
            'cor' => 'required|string|max:255',
            'valor' => 'required|numeric',
        ]);
        // dd($fields);
        $produto->update($fields);

        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produtos $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
