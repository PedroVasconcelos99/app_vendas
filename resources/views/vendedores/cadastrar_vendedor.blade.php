<x-layout>
    <h1 class="my-5">Cadastrar Vendedores</h1>
    <div class="flex justify-center">
        <form id="cadastrar_cliente" action="{{route('vendedores.store')}}" method="post" class="flex flex-col items-end">
            @csrf
            <div class="mb-4">
                <label for="id_loja">loja</label>
                <select name="id_loja" id="id_loja" class="border @error('id_loja') border-red-500 @enderror">
                    <option value="">Selecione uma loja</option>
                    @foreach($lojas as $loja)
                        <option value="{{ $loja->id }}" {{ old('id_loja') == $loja->id ? 'selected' : '' }}>{{ $loja->nome }}</option>
                    @endforeach
                </select>

                @error('loja')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>
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
                <input type="text" name="cpf" id="cpf" value="{{old('cpf')}}" class="border @error('cpf') border-red-500 @enderror">
                
                @error('cpf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

          
            <button class="block mx-auto my-0">Cadastrar</button>
        </form>
    </div>
    @vite('resources/js/validarCpf.js')
</x-layout>