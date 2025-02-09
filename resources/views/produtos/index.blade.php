<x-layout>
    <h1>Produtos</h1>
    <a class="mb-2" href="{{ route('produtos.create') }}"><b>+</b> Cadastrar novo produto</a>
    <div class="border-b p-2 my-2 grid grid-cols-5 text-center">
        <p>id</p>
        <p>nome</p>
        <p>cor</p>
        <p>valor</p>
        <p>ações</p>
    </div>
    @foreach ($produtos as $produto)
        <div class="border-b p-2 grid grid-cols-5 text-center">
            <p>{{ $produto->id }}</p>
            <p>{{ $produto->nome }}</p>
            <p>{{ $produto->cor }}</p>
            <p>{{ $produto->valor }}</p>
            <div>
                <a class="text-green-500" href="{{ route('produtos.edit', $produto) }}">Editar</a>
                <form action="{{ route('produtos.destroy', $produto) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-700 cursor-pointer">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout>