import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                    'resources/js/app.js',
                    'resources/js/validarCpf.js', 
                    'resources/js/validarCnpj.js',
                    'resources/js/buscarCep.js',
                    'resources/js/adicionarProduto.js',
                ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
