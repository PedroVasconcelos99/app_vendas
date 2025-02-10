<x-layout>
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('lojas.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <h1 class="my-5 text-2xl font-bold text-center">Cadastrar Loja</h1>
    <div class="flex justify-center">
        <form id="formulario_loja" action="{{ route('lojas.store') }}" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-bold mb-2">Nome</label>
                <input type="text" name="nome" value="{{ old('nome') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('nome') border-red-500 @enderror">
                @error('nome')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cnpj" class="block text-gray-700 font-bold mb-2">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" value="{{ old('cnpj') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('cnpj') border-red-500 @enderror">
                @error('cnpj')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cep" class="block text-gray-700 font-bold mb-2">CEP</label>
                <input type="text" name="cep" id="cep" value="{{ old('cep') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('cep') border-red-500 @enderror">
                @error('cep')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-gray-700 font-bold mb-2">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="{{ old('endereco') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('endereco') border-red-500 @enderror">
                @error('endereco')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bairro" class="block text-gray-700 font-bold mb-2">Bairro</label>
                <input type="text" name="bairro" id="bairro" value="{{ old('bairro') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('bairro') border-red-500 @enderror">
                @error('bairro')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cidade" class="block text-gray-700 font-bold mb-2">Cidade</label>
                <input type="text" name="cidade" id="cidade" value="{{ old('cidade') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('cidade') border-red-500 @enderror">
                @error('cidade')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="uf" class="block text-gray-700 font-bold mb-2">UF</label>
                <input type="text" name="uf" id="uf" value="{{ old('uf') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('uf') border-red-500 @enderror">
                @error('uf')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="cursor-pointer w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cadastrar</button>
        </form>
    </div>
    @vite('resources/js/validarCnpj.js')
    @vite('resources/js/buscarCep.js')
</x-layout>