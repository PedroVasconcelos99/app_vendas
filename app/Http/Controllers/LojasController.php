<?php

namespace App\Http\Controllers;

use App\Models\lojas;
use App\Http\Requests\StorelojasRequest;
use App\Http\Requests\UpdatelojasRequest;

class LojasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lojas = lojas::all();
        return view('lojas.index', ['lojas' => $lojas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lojas.cadastrar_loja');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorelojasRequest $request)
    {
        // dd('ok');
        //
        $fields = $request->validate([
            'nome'=>['required'],
            'cnpj'=>['required'],
            'cep'=>['required'],
            'endereco'=>['required'],
            'bairro'=>['required'],
            'cidade'=>['required'],
            'uf'=>['required'],
            
        ],[
            'nome.required' => 'O campo nome é obrigatório',
            'cnpj.required' => 'O campo cnpj é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'bairro.required' => 'O campo bairro é obrigatório',
            'cidade.required' => 'O campo cidade é obrigatório',
            'uf.required' => 'O campo uf é obrigatório',
        ]);

        // dd($fields);
       ; 
        lojas::create($fields);
        return redirect()->route('lojas.index')->with('success', 'Loja cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(lojas $lojas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lojas $loja)
    {
        //
        // dd($loja);
        return view('lojas.editar', ['loja' => $loja]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatelojasRequest $request, lojas $loja)
    {
        //
        $fields = $request->validate([
            'nome'=>['required'],
            'cnpj'=>['required'],
            'cep'=>['required'],
            'endereco'=>['required'],
            'bairro'=>['required'],
            'cidade'=>['required'],
            'uf'=>['required'],
            
        ],[
            'nome.required' => 'O campo nome é obrigatório',
            'cnpj.required' => 'O campo cnpj é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'bairro.required' => 'O campo bairro é obrigatório',
            'cidade.required' => 'O campo cidade é obrigatório',
            'uf.required' => 'O campo uf é obrigatório',
        ]);

        // dd($fields);
       ; 
        $loja->update($fields);
        return redirect()->route('lojas.index')->with('success', 'Loja atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lojas $loja)
    {
        $loja->delete();

        return redirect()->route('lojas.index')->with('success', 'Loja deletada com sucesso!');
    }
}
