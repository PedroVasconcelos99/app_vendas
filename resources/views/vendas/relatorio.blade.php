<x-layout>
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('vendas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <h1 class="text-center font-bold text-4xl mb-5">Relatório de Vendas</h1>
    <form action="{{ route('vendas.relatorio') }}" method="GET" class="mb-4">
        <div class="grid grid-cols-5 gap-4">
            <div class="mb-4">
                <label for="data_inicio" class="block text-gray-700 font-bold mb-2">Data Início</label>
                <input type="date" name="data_inicio" id="data_inicio" class="border rounded w-full py-2 px-3 text-gray-700" value="{{ request('data_inicio') }}">
            </div>
            <div class="mb-4">
                <label for="data_fim" class="block text-gray-700 font-bold mb-2">Data Fim</label>
                <input type="date" name="data_fim" id="data_fim" class="border rounded w-full py-2 px-3 text-gray-700" value="{{ request('data_fim') }}">
            </div>
            <div class="mb-4">
                <label for="cliente_id" class="block text-gray-700 font-bold mb-2">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="loja_id" class="block text-gray-700 font-bold mb-2">Loja</label>
                <select name="loja_id" id="loja_id" class="border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ request('loja_id') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="vendedor_id" class="block text-gray-700 font-bold mb-2">Vendedor</label>
                <select name="vendedor_id" id="vendedor_id" class="border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">Selecione um vendedor</option>
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}" {{ request('vendedor_id') == $vendedor->id ? 'selected' : '' }}>{{ $vendedor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-end mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition-all duration-300 mr-2">Filtrar</button>
                <a href="{{ route('vendas.relatorio') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Limpar Filtros</a>
            </div>
        </div>
    </form>
    @if($vendas->isEmpty())
        <p class="text-center text-red-500">Nenhuma venda encontrada.</p>
    @else
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">ID Venda</th>
                    <th class="border px-4 py-2">Nome Cliente</th>
                    <th class="border px-4 py-2">Nome Loja</th>
                    <th class="border px-4 py-2">Nome Vendedor</th>
                    <th class="border px-4 py-2">Valor Total</th>
                    <th class="border px-4 py-2">Quantidade de Produtos</th>
                    <th class="border px-4 py-2">Forma de Pagamento</th>
                    <th class="border px-4 py-2">Observação</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($vendas as $venda)
                    <tr class="border-b">
                        <td class="border px-4 py-2">{{ $venda->id }}</td>
                        <td class="border px-4 py-2">{{ $venda->cliente->nome }}</td>
                        <td class="border px-4 py-2">{{ $venda->loja->nome }}</td>
                        <td class="border px-4 py-2">{{ $venda->vendedor->nome }}</td>
                        <td class="border px-4 py-2">{{ $venda->valor_total }}</td>
                        <td class="border px-4 py-2">{{ $venda->produtos->sum('pivot.quantidade') }}</td>
                        <td class="border px-4 py-2">{{ $venda->forma_pagamento }}</td>
                        <td class="border px-4 py-2">{{ $venda->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>