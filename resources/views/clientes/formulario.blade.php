<x-layout>
    <div class="flex justify-end items-center mb-4">
        <a href="{{ route('clientes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>
    <h1 class="my-5 text-2xl font-bold text-center">Cadastrar Clientes</h1>
    <div class="flex  justify-center">
        <form id="cadastrar_cliente" action="{{ route('clientes.store') }}" method="post" class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md">
            @csrf
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

            <div class="mb-4">
                <label for="sexo" class="block text-gray-700 font-bold mb-2">Sexo</label>
                <input type="text" name="sexo" value="{{ old('sexo') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('sexo') border-red-500 @enderror">
                @error('sexo')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="border rounded w-full py-2 px-3 text-gray-700 @error('email') border-red-500 @enderror">
                @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="cursor-pointer w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cadastrar</button>
        </form>
    </div>
    @vite('resources/js/validarCpf.js')
</x-layout>