<x-layout>
    <h1 class="my-5">Editar Cliente</h1>
    <a href="{{route('lojas.index')}}" class="mb-2">Voltar</a>
    <div class="flex justify-center">
        <form action="{{route('lojas.update',$loja)}}" method="post" class="flex flex-col items-end">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nome">nome</label>
                <input type="text" name="nome" value="{{$loja->nome}}" class="border @error('nome') border-red-500
                @enderror">

                @error('nome')
                   <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" value="{{$loja->cnpj}}" class="border @error('cnpj') border-red-500 @enderror">
                
                @error('cnpj')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cep">CEP</label>
                <input type="cep" name="cep" value="{{$loja->cep}}" class="border  @error('cep') border-red-500 @enderror">
                
                @error('cep')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="endereco">endereço</label>
                <input type="text" name="endereco"  value="{{$loja->endereco}}" class="border @error('endereco') border-red-500 @enderror">
                @error('endereco')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="bairro">bairro</label>
                <input type="text" name="bairro"  value="{{$loja->bairro}}" class="border @error('bairro') border-red-500 @enderror">
                @error('bairro')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="cidade">cidade</label>
                <input type="text" name="cidade"  value="{{$loja->cidade}}" class="border @error('cidade') border-red-500 @enderror">
                @error('cidade')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>

            <div class="mb-4">
                <label for="uf">UF</label>
                <input type="text" name="uf"  value="{{$loja->uf}}" class="border @error('uf') border-red-500 @enderror">
                @error('uf')
                    <p class="text-red-500">{{$message}}</p> 
                @enderror
            </div>
            <button class="block mx-auto my-0 cursor-pointer">Atualizar</button>
        </form>
    </div>
</x-layout>