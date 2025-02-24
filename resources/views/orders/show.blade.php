<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Просмотр заказа</title>
</head>
<body>
    <h1>Просмотр заказа</h1>
    <p><strong>ФИО покупателя:</strong> {{ $order->customer_name }}</p>
    <p><strong>Товар:</strong> {{ $order->product->name }}</p>
    <p><strong>Количество:</strong> {{ $order->quantity }}</p>
    <p><strong>Итоговая цена:</strong> {{ $order->total_price }} руб.</p>
    <p><strong>Статус:</strong> {{ $order->status }}</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>
    <a href="{{ route('orders.index') }}">Назад к списку</a>
</body>
</html>