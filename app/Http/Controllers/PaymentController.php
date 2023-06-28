<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function step1(Order $order){
        dd($order->orderDetails);
    }
}
