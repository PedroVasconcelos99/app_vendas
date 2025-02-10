<x-layout>
    <h1 class="my-5">Relatório de Vendas</h1>
    <form action="{{ route('vendas.relatorio') }}" method="GET" class="mb-4">
        <div class="grid grid-cols-5 gap-1">
            <div class="mb-4">
                <label for="data_inicio">Data Início</label>
                <input type="date" name="data_inicio" id="data_inicio" class="border " value="{{ request('data_inicio') }}">
            </div>
            <div class="mb-4">
                <label for="data_fim">Data Fim</label>
                <input type="date" name="data_fim" id="data_fim" class="border" value="{{ request('data_fim') }}">
            </div>
            <div class="mb-4">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" id="cliente_id" class="border ">
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ request('cliente_id') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="loja_id">Loja</label>
                <select name="loja_id" id="loja_id" class="border ">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ request('loja_id') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="vendedor_id">Vendedor</label>
                <select name="vendedor_id" id="vendedor_id" class="border ">
                    <option value="">Selecione um vendedor</option>
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}" {{ request('vendedor_id') == $vendedor->id ? 'selected' : '' }}>{{ $vendedor->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex mb-4">
                <button type="submit" class="mr-5 cursor-pointer">Filtrar</button>
                <a href="{{ route('vendas.relatorio') }}" class="">Limpar Filtros</a>
            </div>
        </div>
    </form>
    @if($vendas->isEmpty())
        <p class="text-center text-red-500">Nenhuma venda encontrada.</p>
    @else
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th>ID Venda</th>
                    <th>Nome Cliente</th>
                    <th>Nome Loja</th>
                    <th>Nome Vendedor</th>
                    <th>Valor Total</th>
                    <th>Quantidade de Produtos</th>
                    <th>Forma de Pagamento</th>
                    <th>Observação</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($vendas as $venda)
                    <tr class="border-b">
                        <td>{{ $venda->id }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->loja->nome }}</td>
                        <td>{{ $venda->vendedor->nome }}</td>
                        <td>{{ $venda->valor_total }}</td>
                        <td>{{ $venda->produtos->sum('pivot.quantidade') }}</td>
                        <td>{{ $venda->forma_pagamento }}</td>
                        <td>{{ $venda->observacao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layout>