<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;

class ShowController extends Controller
{
    public function __invoke(Order $order)
    {
        $order->load(['user', 'items.product']);
        return view('order.show', compact('order'));
    }
}
