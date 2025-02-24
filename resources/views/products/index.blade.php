<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Список товаров</title>
</head>
<body>
    
    

    <div class="flex mt-10 ml-10 flex-col md:flex-row justify-between items-center mb-6">
        <h1 class="text-2xl text-bold">Продукты</h1>
        <a href="{{ route('products.create') }}">
             <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 mr-10">
            Добавить товар
        </button>
        </a>
       
    </div>

    <!-- User Table -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">ID</th>
                    <th class="py-3 px-6 text-left">Название</th>
                    <th class="py-3 px-6 text-left">Категория</th>
                    <th class="py-3 px-6 text-left">Цена</th>
                    <th class="py-3 px-6 text-center">Действия</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach ($products as $product)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $product->id }}</td>
                    <td class="py-3 px-6 text-left">{{ $product->name }}</td>
                    <td class="py-3 px-6 text-left">{{ $product->category->name }}</td>
                    <td class="py-3 px-6 text-left">{{ $product->price }} руб.</td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <a class="w-4 mr-2 transform hover:text-green-500 hover:scale-110" href="{{ route('products.show', $product) }}">
                                <svg fill="none" viewBox="0 0 125 125" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M62.75,0C28.15,0,0,28.15,0,62.75s28.15,62.75,62.75,62.75,62.75-28.15,62.75-62.75S97.35,0,62.75,0Zm0,4.54c31.58,0,57.36,25.28,58.19,56.66-19.33-20.57-39.73-30.56-60.67-29.7-17.9,.74-32.73,9.46-42.02,16.66-6.43,4.98-11.1,9.84-13.69,12.78C5.53,29.68,31.26,4.54,62.75,4.54Zm-24.75,58.21c0-13.64,11.1-24.75,24.75-24.75s24.75,11.1,24.75,24.75-11.1,24.75-24.75,24.75-24.75-11.1-24.75-24.75Zm-4.54,0c0,10.91,6,20.44,14.88,25.48-14.38-2.89-28.2-10.68-41.23-23.29,4.26-4.97,18.94-20.62,39.48-26.6-7.9,5.25-13.13,14.23-13.13,24.41Zm58.57,0c0-10.16-5.2-19.12-13.08-24.38,13.41,3.97,26.57,12.87,39.34,26.63-4.63,4.3-19.41,16.86-39.36,22.14,7.89-5.25,13.1-14.22,13.1-24.39Zm-29.28,58.21c-29.96,0-54.7-22.75-57.87-51.88,17.47,16.57,36.39,24.97,56.28,24.97,.27,0,.53,0,.8,0,18.29-.21,33.94-7.63,43.84-13.83,6.92-4.33,12.02-8.61,14.82-11.17-3.15,29.15-27.9,51.92-57.87,51.92Z"/></g></svg>
                                
                            </a>
                            <a class="w-4 mr-2 transform hover:text-blue-500 hover:scale-110" href="{{ route('products.edit', $product) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;" class="w-4 mr-2 transform hover:text-red-500 hover:scale-110" >
                            
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
    
</body>
</html>