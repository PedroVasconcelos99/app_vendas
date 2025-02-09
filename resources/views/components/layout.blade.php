<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="">
        <nav>
            <div class="flex items-center gap-4">
               <a href="{{route('home')}}" class="">Home</a>
               <a href="{{route('clientes.index')}}" class="">Clientes</a>
               <a href="{{route('lojas.index')}}" class="">Lojas</a>
               <a href="{{route('vendedores.index')}}" class="">vendedores</a>
               <a href="{{route('produtos.index')}}" class="">Produtos</a>

           </div>
        </nav>
    </header>
    <main class="py-8 mx-auto">
        {{$slot}}
    </main>
</body>
</html>