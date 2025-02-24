<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать заказ</title>
</head>
<body>
    <h1>Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div>
            <label for="customer_name">ФИО покупателя:</label>
            <input type="text" name="customer_name" id="customer_name" required>
        </div>
        <div>
            <label for="product_id">Товар:</label>
            <select name="product_id" id="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }} ({{ $product->price }} руб.)</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="quantity">Количество:</label>
            <input type="number" name="quantity" id="quantity" min="1" required>
        </div>
        <div>
            <label for="comment">Комментарий:</label>
            <textarea name="comment" id="comment"></textarea>
        </div>
        <button type="submit">Создать заказ</button>
    </form>
</body>
</html>