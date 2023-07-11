<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $orders = Order::all();
        return view('adminpanel::order.index',['orders' => $orders]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request     *
     * @return Renderable
     */
    public function update(Request $request)
    {
        $orderID = $request->input('order_id');
        $paymentStatus = $request->input('payment_status');
        $orderStatus = $request->input('order_status');
        $order = Order::find($orderID);
        $order->payment_status = $paymentStatus;
        $order->order_status = $orderStatus;
        $order->save();
        return redirect()->route('admin.order.index')->with('success','Order Updated');
    }

    public function invoice(Order $order){
        $mpdf = new \Mpdf\Mpdf();
        $stylesheet = file_get_contents(public_path().'/css/pdf.css');
        $mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
        $content = view('adminpanel::order.invoice',['order' => $order]);
        $mpdf->writeHtml($content);
        $mpdf->Output();
    }
}
