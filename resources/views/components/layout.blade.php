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
    <header class="h-16 bg-gray-600 text-white flex items-center justify-between px-8">
        <nav class="flex items-center gap-10">
               <a href="{{route('home')}}" class="{{ Route::is('home') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300 ' }}">Home</a>
               <a href="{{route('clientes.index')}}" class="{{ Route::is('clientes*') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300' }}">Clientes</a>
               <a href="{{route('lojas.index')}}" class="{{ Route::is('lojas*') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300' }}">Lojas</a>
               <a href="{{route('vendedores.index')}}" class="{{ Route::is('vendedores*') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300' }}">vendedores</a>
               <a href="{{route('produtos.index')}}" class="{{ Route::is('produtos*') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300' }}">Produtos</a>
               <a href="{{route('vendas.index')}}" class="{{ Route::is('vendas*') ? 'button white' : 'hover:bg-white hover:text-black hover:py-2 hover:px-4 hover:rounded-3xl transition-all duration-300' }}">Vendas</a>
        </nav>
    </header>
    <main class="py-8 mx-auto">
        {{$slot}}
    </main>
</body>
</html>