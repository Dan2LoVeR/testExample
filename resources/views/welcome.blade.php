<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        
    </head>
    
    <body >
        <h1 class="text-3xl flex justify-center mt-10"> Тестовое задание </h1>
        <div class="flex justify-center mt-40">
            <a href="{{ route('products.index') }}">
                <button class="bg-blue-500 text-white text-xl px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ">
               К продуктам
           </button>
           </a>
           <a href="{{ route('products.index') }}">
            <button class="bg-blue-500 text-white text-xl px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ml-10">
                К заказам
            </button>
            </a>
        </div>
        
    </body>
</html>
