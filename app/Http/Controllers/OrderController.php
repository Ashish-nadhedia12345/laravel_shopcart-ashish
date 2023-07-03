<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Cart;
use App\Models\Coupon;
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
        // apply coupon if any already added to order
        Order::applyCoupon($order, '');
        $orderDetail = OrderDetail::where('order_id', $orderID)->get();
        return view('order.review',['order' => $order,'orderDetail' => $orderDetail]);

    }
    public function index(Order $order)
    {
        if(isset(Auth::user()->id)){
            $orders = Order::where('user_id',Auth::user()->id)->get();
            return view('orderhistory.index',['orders' => $orders ,'order'=> $order]);
        } else{
            return redirect('login');
        }
        
    }
    public function invoice(Order $order){
       $mpdf = new \Mpdf\Mpdf();
       $stylesheet = file_get_contents(public_path().'/css/pdf.css');
       $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
       $content = view('orderhistory.invoice',['order' => $order]);
       $mpdf->WriteHtml($content);
       $mpdf->output();
    }

    public function applyCoupon(Request $request, Order $order){
        $code = $request->input('coupon_code');
        $addressID=$request->input('address');
        $stat = Order::applyCoupon($order, $code);
        if($stat){
            return redirect()->route('order.review',['address' => $addressID])->with("success","Coupon Applied");
        } else {
            return redirect()->route('order.review',['address' => $addressID])->with("danger","Invalid coupon");
        }
    }

}
