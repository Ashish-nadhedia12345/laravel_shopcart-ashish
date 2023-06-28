<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{   

    public function review(Request $request)
    {
        $addressID = $request->input('address');
        $orderID = Order::createOrder($addressID, auth()->user()->id);
        $order = Order::where('id', $orderID)->first();
        $orderDetail = OrderDetail::where('order_id', $orderID)->get();
        return view('order.review',['order' => $order,'orderDetail' => $orderDetail]);

    }

}
