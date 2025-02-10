<x-layout>
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <h1 class="text-center font-bold text-4xl">Vendas</h1>
    <div class="flex justify-between items-center mb-4">
        
    </div>

    <div class="flex gap-5 justify-between items-center mb-4">
        <div>
            <a class="rounded py-2 px-4 bg-blue-700 text-white hover:bg-blue-950/90 transition-all duration-300" href="{{ route('vendas.create') }}"> Cadastrar nova venda</a>
            <a class="rounded py-2 px-4 bg-blue-700 text-white hover:bg-blue-950/90 transition-all duration-300" href="{{ route('vendas.relatorio') }}"> Relatório</a>
        </div>
        <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>

    <table class="mt-5 table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Cliente</th>
                <th class="border border-gray-300 px-4 py-2">Loja</th>
                <th class="border border-gray-300 px-4 py-2">Vendedor</th>
                <th class="border border-gray-300 px-4 py-2">Data</th>
                <th class="border border-gray-300 px-4 py-2">Valor</th>
                <th class="border border-gray-300 px-4 py-2">Forma de Pagamento</th>
                <th class="border border-gray-300 px-4 py-2">Ações</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($vendas as $venda)
                <tr class="border-b hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->cliente->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->loja->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->vendedor->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->data_venda }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->valor_total }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $venda->forma_pagamento }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a class="text-green-500 mr-2 hover:text-green-800" href="{{ route('vendas.edit', $venda) }}">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 cursor-pointer hover:text-red-800">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>