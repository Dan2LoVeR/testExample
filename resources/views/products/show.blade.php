<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр товара</title>
</head>
<body>
    <h1>Просмотр товара</h1>
    <p><strong>Название:</strong> {{ $product->name }}</p>
    <p><strong>Категория:</strong> {{ $product->category->name }}</p>
    <p><strong>Цена:</strong> {{ $product->price }} руб.</p>
    <p><strong>Описание:</strong> {{ $product->description }}</p>
    <a href="{{ route('products.index') }}">Назад к списку</a>
</body>
</html>