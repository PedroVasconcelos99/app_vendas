<x-layout>
    <h1 class="my-5">Editar Venda</h1>
    <a href="{{ route('vendas.index') }}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form id="editar_venda" action="{{ route('vendas.update', $venda->id) }}" method="post" class="flex flex-col items-end" onsubmit="return verificarProdutos()">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="cliente_id">Cliente</label>
                <select name="cliente_id" class="border @error('cliente_id') border-red-500 @enderror">
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ old('cliente_id', $venda->cliente_id) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
                @error('cliente_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="loja_id">Loja</label>
                <select name="loja_id" class="border @error('loja_id') border-red-500 @enderror">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ old('loja_id', $venda->loja_id) == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
                @error('loja_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="vendedor_id">Vendedor</label>
                <select name="vendedor_id" class="border @error('vendedor_id') border-red-500 @enderror">
                    <option value="">Selecione um vendedor</option>
                    @foreach($vendedores as $vendedor)
                        <option value="{{ $vendedor->id }}" {{ old('vendedor_id', $venda->vendedor_id) == $vendedor->id ? 'selected' : '' }}>{{ $vendedor->nome }}</option>
                    @endforeach
                </select>
                @error('vendedor_id')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="data_venda">Data da Venda</label>
                <input type="date" name="data_venda" value="{{ old('data_venda', $venda->data_venda) }}" class="border @error('data_venda') border-red-500 @enderror">
                @error('data_venda')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="observacao">Observação</label>
                <textarea name="observacao" class="border @error('observacao') border-red-500 @enderror">{{ old('observacao', $venda->observacao) }}</textarea>
                @error('observacao')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="forma_pagamento">Forma de Pagamento</label>
                <select name="forma_pagamento" class="border @error('forma_pagamento') border-red-500 @enderror">
                    <option value="">Selecione</option>
                    <option value="Dinheiro" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                    <option value="Crédito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Crédito' ? 'selected' : '' }}>Crédito</option>
                    <option value="Débito" {{ old('forma_pagamento', $venda->forma_pagamento) == 'Débito' ? 'selected' : '' }}>Débito</option>
                </select>
                @error('forma_pagamento')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="produtos">Produtos</label>
                <div id="produtos">
                    @foreach($vendaProdutos as $produto)
                        <div class="flex items-center mb-2" data-index="{{ $loop->index }}">
                            <select name="produtos[{{ $loop->index }}][id]" class="border mr-2" onchange="calcularValorTotal()">
                                <option value="">Selecione um produto</option>
                                @foreach($produtos as $produtoOption)
                                    <option value="{{ $produtoOption->id }}" data-valor="{{ $produtoOption->valor }}" {{ $produto->id_produto == $produtoOption->id ? 'selected' : '' }}>{{ $produtoOption->nome }}</option>
                                @endforeach
                            </select>
                            <input type="number" name="produtos[{{ $loop->index }}][quantidade]" value="{{ $produto->quantidade }}" class="border ml-2" placeholder="Quantidade" min="1" onchange="calcularValorTotal()">
                            <button type="button" onclick="removerProduto({{ $loop->index }})" class="text-red-500">Remover</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" onclick="adicionarProduto()" class="cursor-pointer">Adicionar Produto</button>
                <p id="produtos-error" class="text-red-500" style="display: none;">Adicione pelo menos um produto.</p>
                @error('produtos')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="valor_total">Valor Total</label>
                <input type="number" name="valor_total" id="valor_total" value="{{ old('valor_total', $venda->valor_total) }}" class="border @error('valor_total') border-red-500 @enderror" step="0.01" min="0" readonly>
                @error('valor_total')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class="block mx-auto my-0 cursor-pointer">Atualizar</button>
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