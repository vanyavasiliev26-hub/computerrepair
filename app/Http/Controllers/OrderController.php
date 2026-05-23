<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Страница создания заявки
    public function create()
    {
        $services = Service::all();
        return view('order.create', compact('services'));
    }

    // Сохранение заявки
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'description' => 'required|string',
            'preferred_date' => 'nullable|date|after_or_equal:today',
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'service_id' => $request->service_id,
            'order_number' => Order::generateOrderNumber(),
            'description' => $request->description,
            'preferred_date' => $request->preferred_date,
            'status' => 'new',
        ]);

        return redirect()->route('order.show', $order->id)->with('success', 'Заявка успешно создана! Номер заявки: ' . $order->order_number);
    }

    // Страница "Мои заявки" (все заявки пользователя)
    public function index()
    {
        $orders = Auth::user()->orders()->with('service')->orderBy('created_at', 'desc')->get();
        return view('order.index', compact('orders'));
    }

    // Просмотр одной заявки
    public function show($id)
    {
        $order = Order::with('service')->where('user_id', Auth::id())->findOrFail($id);
        return view('order.show', compact('order'));
    }

    // Отмена заявки
    public function cancel($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        
        if ($order->status === 'new') {
            $order->update(['status' => 'cancelled']);
            return redirect()->route('orders')->with('success', 'Заявка #' . $order->order_number . ' отменена');
        }
        
        return back()->with('error', 'Эту заявку уже нельзя отменить');
    }
}