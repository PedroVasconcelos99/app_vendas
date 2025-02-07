<x-layout>
    <h1 class="my-5">Cadastrar Clientes</h1>
    <div class="flex justify-center">
        <form action="{{route('clientes.store')}}" method="post" class="flex flex-col items-end">
            @csrf
            <div class="mb-4">
                <label for="nome">nome</label>
                <input type="text" name="nome" value="{{old('nome')}}" class="border @error('nome') border-red-500
                @enderror">

                @error('nome')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf">cpf</label>
                <input type="text" name="cpf" value="{{old('cpf')}}" class="border @error('cpf') border-red-500 @enderror">
                
                @error('cpf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="sexo">sexo</label>
                <input type="sexo" name="sexo" class="border @error('sexo') border-red-500 @enderror">
                
                @error('sexo')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="email">email</label>
                <input type="text" name="email"  value="{{old('email')}}" class="border @error('email') border-red-500 @enderror">
            </div>
            @error('email')
            <p class="text-red-500">{{$message}}</p> 
        @enderror
            <button class="block mx-auto my-0">Cadastrar</button>
        </form>
    </div>
</x-layout>