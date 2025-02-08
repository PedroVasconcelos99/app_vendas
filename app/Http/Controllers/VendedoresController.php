<?php

namespace App\Http\Controllers;

use App\Models\Vendedores;
use App\Http\Requests\StoreVendedoresRequest;
use App\Http\Requests\UpdateVendedoresRequest;
use App\Models\lojas;

class VendedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $vendedores = Vendedores::with('loja')->get();
        // dd($vendedores);
        return view('vendedores.index', compact('vendedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lojas = lojas::all();
        return view('vendedores.cadastrar_vendedor', compact('lojas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVendedoresRequest $request)
    {
        
        $fields = $request->validate([
            'id_loja'=>['required'],
            'nome'=>['required'],
            'cpf'=>['required'],
        ]);
        // dd($fields);

        Vendedores::create($fields);
        return redirect()->route('vendedores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendedores $vendedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vendedores $vendedor)
    {
        $lojas = lojas::all();
        return view('vendedores.editar', compact('vendedor', 'lojas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVendedoresRequest $request, Vendedores $vendedor)
    {
        
        $fields = $request->validate([
            'id_loja'=>['required'],
            'nome'=>['required'],
            'cpf'=>['required'],
        ]);
        // dd($fields);

        $vendedor->update($fields);
        return redirect()->route('vendedores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vendedores $vendedores)
    {
        //
    }
}
