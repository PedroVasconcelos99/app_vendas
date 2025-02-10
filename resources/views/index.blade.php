<x-layout>
    <h1 class="text-6xl text-center mb-10">Bem vindo</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="rounded-lg bg-white border shadow-sm p-6 cursor-pointer  hover:bg-gray-200/90 transition-all duration-300">
            <a href="{{route('clientes.index')}}">
                <h2 class="text-xl font-semibold mb-2">Clientes</h2>
                <p class="text-gray-600">Gerenciar clientes</p>
            </a>
        </div>
        <div class="rounded-lg bg-white border shadow-sm p-6 cursor-pointer  hover:bg-gray-200/90 transition-all duration-300">
            <a href="{{route('lojas.index')}}">
                <h2 class="text-xl font-semibold mb-2">Lojas</h2>
                <p class="text-gray-600">Gerenciar Lojas</p>
            </a>
        </div>
        <div class="rounded-lg bg-white border shadow-sm p-6 cursor-pointer  hover:bg-gray-200/90 transition-all duration-300">
            <a href="{{route('vendedores.index')}}">
                <h2 class="text-xl font-semibold mb-2">Vendedores</h2>
                <p class="text-gray-600">Gerenciar Vendedores</p>
            </a>
        </div>
        <div class="rounded-lg bg-white border shadow-sm p-6 cursor-pointer  hover:bg-gray-200/90 transition-all duration-300">
            <a href="{{route('produtos.index')}}">
                <h2 class="text-xl font-semibold mb-2">Produtos</h2>
                <p class="text-gray-600">Gerenciar produtos</p>
            </a>
        </div>
        <div class="rounded-lg bg-white border shadow-sm p-6 cursor-pointer  hover:bg-gray-200/90 transition-all duration-300">
            <a href="{{route('vendas.index')}}">
                <h2 class="text-xl font-semibold mb-2">Vendas</h2>
                <p class="text-gray-600">Gerenciar vendas</p>
            </a>
        </div>
    </div>
</x-layout>