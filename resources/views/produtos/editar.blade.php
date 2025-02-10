<x-layout>
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('produtos.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <h1 class="my-5 text-2xl font-bold text-center">Editar Produto</h1>
    <div class="flex justify-center">
        <form id="editar_produto" action="{{ route('produtos.update', $produto) }}" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-bold mb-2">Nome</label>
                <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('nome') border-red-500 @enderror">
                @error('nome')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="cor" class="block text-gray-700 font-bold mb-2">Cor</label>
                <input type="text" name="cor" value="{{ old('cor', $produto->cor) }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('cor') border-red-500 @enderror">
                @error('cor')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="valor" class="block text-gray-700 font-bold mb-2">Valor</label>
                <input type="number" step="0.01" name="valor" value="{{ old('valor', $produto->valor) }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('valor') border-red-500 @enderror" step="0.01" min="0">
                @error('valor')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="cursor-pointer w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Atualizar</button>
        </form>
    </div>
</x-layout>