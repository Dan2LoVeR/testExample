<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать товар</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Редактировать товар</h1>

    <!-- Отображение ошибок валидации -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Форма редактирования товара -->
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Поле "Название" -->
        <div>
            <label for="name">Название:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                   class="@error('name') is-invalid @enderror">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Категория" -->
        <div>
            <label for="category_id">Категория:</label>
            <select name="category_id" id="category_id" class="@error('category_id') is-invalid @enderror">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Цена" -->
        <div>
            <label for="price">Цена:</label>
            <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $product->price) }}"
                   class="@error('price') is-invalid @enderror">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Описание" -->
        <div>
            <label for="description">Описание:</label>
            <textarea name="description" id="description" class="@error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Обновить товар</button>
    </form>

    <!-- Ссылка для возврата к списку товаров -->
    <a href="{{ route('products.index') }}">Назад к списку</a>
</body>
</html>