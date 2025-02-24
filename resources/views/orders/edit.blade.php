<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать заказ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Редактировать заказ</h1>

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

    <!-- Форма редактирования заказа -->
    <form action="{{ route('orders.update', $order) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Поле "ФИО покупателя" -->
        <div>
            <label for="customer_name">ФИО покупателя:</label>
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', $order->customer_name) }}"
                   class="@error('customer_name') is-invalid @enderror">
            @error('customer_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Товар" -->
        <div>
            <label for="product_id">Товар:</label>
            <select name="product_id" id="product_id" class="@error('product_id') is-invalid @enderror">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ old('product_id', $order->product_id) == $product->id ? 'selected' : '' }}>
                        {{ $product->name }} ({{ $product->price }} руб.)
                    </option>
                @endforeach
            </select>
            @error('product_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Количество" -->
        <div>
            <label for="quantity">Количество:</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $order->quantity) }}"
                   class="@error('quantity') is-invalid @enderror">
            @error('quantity')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле "Комментарий" -->
        <div>
            <label for="comment">Комментарий:</label>
            <textarea name="comment" id="comment" class="@error('comment') is-invalid @enderror">{{ old('comment', $order->comment) }}</textarea>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Обновить заказ</button>
    </form>

    <!-- Ссылка для возврата к списку заказов -->
    <a href="{{ route('orders.index') }}">Назад к списку</a>
</body>
</html>