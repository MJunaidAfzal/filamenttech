<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->status = 'paid'; 
        $order->save();

        return redirect()->route('orders.show', $orderId)->with('message', 'Payment Successful!');
    }

    public function cancel($orderId)
    {
        return redirect()->route('orders.show', $orderId)->with('message', 'Payment Canceled.');
    }
}
