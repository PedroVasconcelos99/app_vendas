<x-layout>
    <h1>Vendedores</h1>
    <a class="mb-2"  href="{{route('vendedores.create')}}"><b>+</b> Cadastrar novo vendedor </a>
    <div class="border-b p-2 my-2 grid grid-cols-5 text-center">
        <p>id</p>
        <p>loja</p>
        <p>nome</p>
        <p>cpf</p>
        <p>ações</p>
    </div>
    @foreach ($vendedores as $vendedor)
        <div class="border-b p-2  grid grid-cols-5 text-center">
            <p>{{$vendedor->id}}</p>
            <p>{{$vendedor->loja->nome}}</p>
            <p>{{$vendedor->nome}}</p>
            <p>{{$vendedor->cpf}}</p>
            <div>
                <a class="text-green-500" href="{{ route('vendedores.edit', $vendedor)}}">Editar</a>
                <form action="{{ route('vendedores.destroy', $vendedor) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-700 cursor-pointer">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout>