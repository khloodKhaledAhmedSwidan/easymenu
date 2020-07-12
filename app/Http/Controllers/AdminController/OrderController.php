<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function new()
    {
        $orders = auth()->user()->orders()->where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function activeOrders()
    {
        $orders = auth()->user()->orders()->where('status', '1')->get();
        return view('admin.orders.paid', compact('orders'));
    }

    public function compeletedOrders()
    {
        $orders = auth()->user()->orders()->where('status', '2')->get();
        return view('admin.orders.compeleted', compact('orders'));
    }

    public function canceledOrders()
    {
        $orders = auth()->user()->orders()->where('status', '3')->get();
        return view('admin.orders.canceled', compact('orders'));
    }


    public function showOrder($id)
    {
        $order = Order::find($id);
        $order_details = unserialize($order->cart_items);
        return view('admin.orders.show', compact('order', 'order_details'));
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        $order->delete();
        flash('تم حذف الطلب');
        return back();
    }
}
