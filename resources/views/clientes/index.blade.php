
<x-layout>
    <a class="mb-2"  href="{{route('cliente.create')}}"><b>+</b> Cadastrar novo cliente </a>
    <div class="border-b p-2 my-2 grid grid-cols-6 text-center">
        <p>id</p>
        <p>nome</p>
        <p>cpf</p>
        <p>sexo</p>
        <p>email</p>
        <p>ações</p>
    </div>
    @foreach ($clientes as $cliente)
        <div class="border-b p-2  grid grid-cols-6 text-center">
            <p>{{$cliente->id}}</p>
            <p>{{$cliente->nome}}</p>
            <p>{{$cliente->cpf}}</p>
            <p>{{$cliente->sexo}}</p>
            <p>{{$cliente->email}}</p>
            <div>
                <a class="text-green-500" href="{{ route('cliente.edit', $cliente)}}">Editar</a>
                <form action="{{ route('cliente.destroy', $cliente) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-700 cursor-pointer">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout>
