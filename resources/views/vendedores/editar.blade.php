<x-layout>
    <h1 class="my-5">Atualizar Vendedor</h1>
    <a href="{{route('vendedores.index')}}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form id="atualizar_vendedor" action="{{route('vendedores.update', $vendedor)}}" method="post" class="flex flex-col items-end">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="id_loja">loja</label>
                <select name="id_loja" id="id_loja" class="border @error('id_loja') border-red-500 @enderror">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ $vendedor->id_loja == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>

                @error('loja')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>
            <div class="mb-4">
                <label for="nome">nome</label>
                <input type="text" name="nome" value="{{$vendedor->nome}}" class="border @error('nome') border-red-500
                @enderror">

                @error('nome')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cpf">cpf</label>
                <input type="text" name="cpf" id="cpf" value="{{$vendedor->cpf}}" class="border @error('cpf') border-red-500 @enderror">
                
                @error('cpf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

          
            <button class="block mx-auto my-0">Atualizar</button>
        </form>
    </div>
    @vite('resources/js/validarCpf.js')
</x-layout>