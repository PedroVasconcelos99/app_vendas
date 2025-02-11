<x-layout>
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center font-bold text-4xl">Vendedores</h1>
    <div class="flex justify-between items-center mb-4">
        <a class="rounded py-2 px-4 bg-blue-700 text-white hover:bg-blue-950/90 transition-all duration-300" href="{{ route('vendedores.create') }}">Cadastrar novo vendedor</a>
        <a href="{{ route('home') }}" class="bg-gray-500 text-white px-4 py-2 rounded text-right hover:bg-gray-700 transition-all duration-300">Voltar</a>
    </div>

    <table class="mt-5 table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">id</th>
                <th class="border border-gray-300 px-4 py-2">loja</th>
                <th class="border border-gray-300 px-4 py-2">nome</th>
                <th class="border border-gray-300 px-4 py-2">cpf</th>
                <th class="border border-gray-300 px-4 py-2">ações</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($vendedores as $vendedor)
                <tr class="border-b hover:bg-gray-100">
                    <td class="border border-gray-300 px-4 py-2">{{ $vendedor->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $vendedor->loja->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $vendedor->nome }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $vendedor->cpf }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a class="text-green-500 mr-2 hover:text-green-800" href="{{ route('vendedores.edit', $vendedor) }}">Editar</a>
                        <form action="{{ route('vendedores.destroy', $vendedor) }}" method="post" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 cursor-pointer hover:text-red-800">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>