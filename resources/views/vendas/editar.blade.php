<x-layout>
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('vendas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <h1 class="my-5 text-2xl font-bold text-center">Editar Venda</h1>
    <div class="flex justify-center">
        <form id="editar_venda" action="{{ route('vendas.update', $venda->id) }}" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md" onsubmit="return verificarProdutos()">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="cliente_id" class="block text-gray-700 font-bold mb-2">Cliente</label>
                <select name="cliente_id" class="border rounded w-full py-2 px-3 text-gray-700 @error('cliente_id') border-red-500 @enderror">
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $venda->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="loja_id" class="block text-gray-700 font-bold mb-2">Loja</label>
                <select name="loja_id" id="loja_id" class="border rounded w-full py-2 px-3 text-gray-700 @error('loja_id') border-red-500 @enderror" onchange="filtrarVendedores()">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ old('loja_id', $venda->loja_id) == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
                @error('loja_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vendedor_id" class="block text-gray-700 font-bold mb-2">Vendedor</label>
                <select name="vendedor_id" id="vendedor_id" class="border rounded w-full py-2 px-3 text-gray-700 @error('vendedor_id') border-red-500 @enderror">
                    <option value="">Selecione um vendedor</option>
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}" data-loja="{{ $vendedor->loja_id }}" {{ old('vendedor_id', $venda->vendedor_id) == $vendedor->id ? 'selected' : '' }}>{{ $vendedor->nome }}</option>
                    @endforeach
                </select>
                @error('vendedor_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="data_venda" class="block text-gray-700 font-bold mb-2">Data da Venda</label>
                <input type="date" name="data_venda" value="{{ old('data_venda', $venda->data_venda) }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('data_venda') border-red-500 @enderror">
                @error('data_venda')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="observacao" class="block text-gray-700 font-bold mb-2">Observação</label>
                <textarea name="observacao" class="border rounded w-full py-2 px-3 text-gray-700 @error('observacao') border-red-500 @enderror">{{ old('observacao', $venda->observacao) }}</textarea>
                @error('observacao')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="forma_pagamento" class="block text-gray-700 font-bold mb-2">Forma de Pagamento</label>
                <select name="forma_pagamento" class="border rounded w-full py-2 px-3 text-gray-700 @error('forma_pagamento') border-red-500 @enderror">
                    <option value="">Selecione</option>
                    <option value="Dinheiro" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                    <option value="Crédito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Crédito' ? 'selected' : '' }}>Crédito</option>
                    <option value="Débito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Débito' ? 'selected' : '' }}>Débito</option>
                </select>
                @error('forma_pagamento')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="produtos" class="block text-gray-700 font-bold mb-2">Produtos</label>
                <div id="produtos">
                    @foreach($vendaProdutos as $produto)
                        <div class="flex items-center mb-2" data-index="{{ $loop->index }}">
                            <select name="produtos[{{ $loop->index }}][id]" class="border rounded mr-2" onchange="calcularValorTotal()">
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produtoOption)
                                    <option value="{{ $produtoOption->id }}" data-valor="{{ $produtoOption->valor }}" {{ $produto->id_produto == $produtoOption->id ? 'selected' : '' }}>{{ $produtoOption->nome }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="produtos[{{ $loop->index }}][quantidade]" value="{{ $produto->quantidade }}" class="border rounded ml-2" placeholder="Quantidade" min="1" onchange="calcularValorTotal()">
                            <button type="button" onclick="removerProduto({{ $loop->index }})" class="text-red-500 ml-2">Remover</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="adicionarProduto()" class="cursor-pointer bg-blue-700 text-white py-2 px-4 rounded hover:bg-blue-950/90 transition-all duration-300 mt-2">Adicionar Produto</button>
                <p id="produtos-error" class="text-red-500 text-xs italic" style="display: none;">Adicione pelo menos um produto.</p>
                @error('produtos')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="valor_total" class="block text-gray-700 font-bold mb-2">Valor Total</label>
                <input type="number" name="valor_total" id="valor_total" value="{{ old('valor_total', $venda->valor_total) }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('valor_total') border-red-500 @enderror" step="0.01" min="0" readonly>
                @error('valor_total')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="cursor-pointer w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Atualizar</button>
        </form>
    </div>
    <script>
       
        const produtosOptions = `
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}" data-valor="{{ $produto->valor }}">{{ $produto->nome }}</option>
            @endforeach
        `;
    </script>
    @vite('resources/js/adicionarProduto.js')
</x-layout>