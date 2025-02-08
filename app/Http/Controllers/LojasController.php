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
            
        ]);

        // dd($fields);
       ; 
        lojas::create($fields);
        return redirect()->route('lojas.index');
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
            
        ]);

        // dd($fields);
       ; 
        $loja->update($fields);
        return redirect()->route('lojas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lojas $loja)
    {
        $loja->delete();

        return redirect()->route('lojas.index');
    }
}
