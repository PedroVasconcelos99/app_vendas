<x-layout>
    <h1 class="my-5">Editar Cliente</h1>
    <a href="{{route('clientes.index')}}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form action="{{route('clientes.update',$cliente)}}" method="post" class="flex flex-col items-end">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nome">nome</label>
                <input type="text" name="nome" value="{{$cliente->nome}}" class="border @error('nome') border-red-500
                @enderror">

                @error('nome')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf">cpf</label>
                <input type="text" name="cpf" value="{{$cliente->cpf}}" class="border @error('cpf') border-red-500 @enderror">
                
                @error('cpf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="sexo">sexo</label>
                <input type="sexo" name="sexo" value="{{$cliente->sexo}}" class="border  @error('sexo') border-red-500 @enderror">
                
                @error('sexo')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="email">email</label>
                <input type="text" name="email"  value="{{$cliente->email}}" class="border @error('email') border-red-500 @enderror">
            </div>
            @error('email')
            <p class="text-red-500">{{$message}}</p> 
        @enderror
            <button class="block mx-auto my-0 cursor-pointer">Atualizar</button>
        </form>
    </div>
</x-layout>