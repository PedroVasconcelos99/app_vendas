<x-layout>
    <h1 class="my-5">Cadastrar Loja</h1>
    <div class="flex justify-center">
        <form id="cadastrar_cliente" action="{{route('lojas.store')}}" method="post" class="flex flex-col items-end">
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
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" value="{{old('cnpj')}}" class="border @error('cnpj') border-red-500 @enderror">
                
                @error('cnpj')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cep">CEP</label>
                <input type="cep" name="cep" class="border @error('cep') border-red-500 @enderror">
                
                @error('cep')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="endereco">endereço</label>
                <input type="text" name="endereco"  value="{{old('endereco')}}" class="border @error('endereco') border-red-500 @enderror">
                @error('endereco')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="bairro">bairro</label>
                <input type="text" name="bairro"  value="{{old('bairro')}}" class="border @error('bairro') border-red-500 @enderror">
                @error('bairro')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cidade">cidade</label>
                <input type="text" name="cidade"  value="{{old('cidade')}}" class="border @error('cidade') border-red-500 @enderror">
                @error('cidade')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="uf">UF</label>
                <input type="text" name="uf"  value="{{old('uf')}}" class="border @error('uf') border-red-500 @enderror">
                @error('uf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>
            <button class="block mx-auto my-0">Cadastrar</button>
        </form>
    </div>
    @vite('resources/js/validarcnpj.js')
</x-layout>