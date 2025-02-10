<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-center w-full">Cadastrar Vendedor</h1>
        <a href="{{ route('vendedores.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <div class="flex justify-center">
        <form id="cadastrar_pessoa" action="{{ route('vendedores.store') }}" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            @csrf
            <div class="mb-4">
                <label for="id_loja" class="block text-gray-700 font-bold mb-2">Loja</label>
                <select name="id_loja" id="id_loja" class="border rounded w-full py-2 px-3 text-gray-700 @error('id_loja') border-red-500 @enderror">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ old('id_loja') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>
                @error('id_loja')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nome" class="block text-gray-700 font-bold mb-2">Nome</label>
                <input type="text" name="nome" value="{{ old('nome') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('nome') border-red-500 @enderror">
                @error('nome')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-gray-700 font-bold mb-2">CPF</label>
                <input type="text" name="cpf" id="cpf" value="{{ old('cpf') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('cpf') border-red-500 @enderror">
                @error('cpf')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="cursor-pointer w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cadastrar</button>
        </form>
    </div>
    @vite('resources/js/validarCpf.js')
</x-layout>