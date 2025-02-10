<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Http\Requests\StoreClientesRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::all();

        // dd($clientes);
        return view('clientes.index' , ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientesRequest $request)
    {
        //
        $fields = $request->validate([
            'nome'=>['required'],
            'cpf'=>['required'],
            'sexo'=>['required'],
            'email'=>['required','email','unique:clientes'],
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
        ]);

        // dd($fields);
       
        Clientes::create($fields);
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clientes $cliente)
    {
        return view('clientes.editar', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $request, Clientes $cliente)
    {
        $fields = $request->validate([
            'nome'=>['required'],
            'cpf'=>['required'],
            'sexo'=>['required'],
            'email' => ['required', 'email', 'unique:clientes,email,' . $cliente->id],
            
        ],
        [
            'nome.required' => 'O campo nome é obrigatório.',
            'sexo.required' => 'O campo sexo é obrigatório.',
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de e-mail válido.',
        ]);

        // dd($fields);
       ; 
        $cliente->update($fields);
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
