<x-layout>
    <h1 class="my-5">Editar Produto</h1>
    <a href="{{ route('produtos.index') }}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form id="editar_produto" action="{{ route('produtos.update', $produto) }}" method="post" class="flex flex-col items-end">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" class="border @error('nome') border-red-500 @enderror">
                @error('nome')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="cor">Cor</label>
                <input type="text" name="cor" value="{{ old('cor', $produto->cor) }}" class="border @error('cor') border-red-500 @enderror">
                @error('cor')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="valor">Valor</label>
                <input type="number" name="valor" value="{{ old('valor', $produto->valor) }}" class="border @error('valor') border-red-500 @enderror" step="0.01" min="0">
                @error('valor')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class="block mx-auto my-0 cursor-pointer">Atualizar</button>
        </form>
    </div>
</x-layout>