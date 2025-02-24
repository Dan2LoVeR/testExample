<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('product')->get();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Валидация данных
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        // Рассчитываем итоговую цену
        $product = Product::find($request->product_id);
        $totalPrice = $product->price * $request->quantity;

        // Создаем заказ, исключая поле _token
        Order::create([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'status' => 'new', // Статус по умолчанию
            'comment' => $request->comment,
            'created_at' => now(), // Текущая дата и время
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно создан.');
    }

    public function updateStatus(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->route('orders.show', $order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }


    public function edit(Order $order)
    {
        $products = Product::all();
        return view('orders.edit', compact('order', 'products'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Order $order)
    {
        // Валидация данных
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'comment' => 'nullable|string',
        ]);

        // Находим товар
        $product = Product::find($request->product_id);

        // Рассчитываем итоговую цену
        $totalPrice = $product->price * $request->quantity;

        // Обновляем заказ
        $order->update([
            'customer_name' => $request->customer_name,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'comment' => $request->comment,
        ]);

        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно обновлен.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')
            ->with('success', 'Заказ успешно удален.');
    }
}
