<x-layout>
    <h1 class="my-5">Cadastrar Produto</h1>
    <a href="{{ route('produtos.index') }}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form id="cadastrar_produto" action="{{ route('produtos.store') }}" method="post" class="flex flex-col items-end">
            @csrf
            <div class="mb-4">
                <label for="nome">Nome</label>
                <input type="text" name="nome" value="{{ old('nome') }}" class="border @error('nome') border-red-500 @enderror">
                @error('nome')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="cor">Cor</label>
                <input type="text" name="cor" value="{{ old('cor') }}" class="border @error('cor') border-red-500 @enderror">
                @error('cor')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="valor">Valor</label>
                <input type="number" name="valor" value="{{ old('valor') }}" class="border @error('valor') border-red-500 @enderror">
                @error('valor')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button class="block mx-auto my-0 cursor-pointer">Cadastrar</button>
        </form>
    </div>
</x-layout>