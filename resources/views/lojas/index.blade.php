<x-layout>
    <h1>Lojas</h1>
    <a class="mb-2"  href="{{route('lojas.create')}}"><b>+</b> Cadastrar nova Loja </a>
    <div class="border-b p-2 my-2 grid grid-cols-9 text-center">
        <p>id</p>
        <p>nome</p>
        <p>cnpj</p>
        <p>cep</p>
        <p>endereço</p>
        <p>bairro</p>
        <p>cidade</p>
        <p>uf</p>
        <p>ações</p>
    </div>
    @foreach ($lojas as $loja)
        <div class="border-b p-2  grid grid-cols-9 text-center">
            <p>{{$loja->id}}</p>
            <p>{{$loja->nome}}</p>
            <p>{{$loja->cnpj}}</p>
            <p>{{$loja->cep}}</p>
            <p>{{$loja->endereco}}</p>
            <p>{{$loja->bairro}}</p>
            <p>{{$loja->cidade}}</p>
            <p>{{$loja->uf}}</p>
            <div>
                <a class="text-green-500" href="{{ route('lojas.edit', $loja)}}">Editar</a>
                <form action="{{ route('lojas.destroy', $loja) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-700 cursor-pointer">Excluir</button>
                </form>
            </div>
        </div>
    @endforeach
</x-layout>