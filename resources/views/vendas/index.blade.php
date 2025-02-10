<x-layout>
    <h1>Vendas</h1>
    <a class="mb-2" href="{{ route('vendas.create') }}"><b>+</b> Cadastrar nova venda</a>
    <a class="mb-2" href="{{ route('vendas.relatorio') }}"><b>+</b> Relatorio</a>
    <div class="border-b p-2 my-2 grid grid-cols-8 text-center">
        <p>ID</p>
        <p>Cliente</p>
        <p>Loja</p>
        <p>Vendedor</p>
        <p>Data</p>
        <p>Valor</p>
        <p>Forma de Pagamento</p>
        <p>Ações</p>
    </div>
    @foreach ($vendas as $venda)
        <div class="border-b p-2 grid grid-cols-8 text-center">
            <p>{{ $venda->id }}</p>
            <p>{{ $venda->cliente->nome }}</p>
            <p>{{ $venda->loja->nome }}</p>
            <p>{{ $venda->vendedor->nome}}</p>
            <p>{{ $venda->data_venda }}</p>
            <p>{{ $venda->valor_total }}</p>
            <p>{{ $venda->forma_pagamento }}</p>
            <div>
                <a class="text-green-500" href="{{ route('vendas.edit', $venda) }}">Editar</a>
                <form action="{{ route('vendas.destroy', $venda) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-700 cursor-pointer">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout>