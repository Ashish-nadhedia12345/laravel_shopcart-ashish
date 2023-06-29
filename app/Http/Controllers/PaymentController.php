<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function step1(Order $order)
    {
        return view('payment.step1', ['order' => $order]);
    }

    public function response(Order $order)
    {
        $postdata = $_POST;
        $msg = '';
        if (isset($postdata['key'])) {
            $key = 'fcZxr6';
            $salt = 'xBJpv25HH6q8saJOimBllTHPpVj5iHno';
            $txnid = $postdata['txnid'];
            $amount = $postdata['amount'];
            $productInfo = $postdata['productinfo'];
            $firstname = $postdata['firstname'];
            $email = $postdata['email'];
            $udf5 = $postdata['udf5'];
            $mihpayid = $postdata['mihpayid'];
            $status = $postdata['status'];
            $resphash = $postdata['hash'];
            //Calculate response hash to verify
            $keyString = $key . '|' . $txnid . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||' . $udf5 . '|||||';
            $keyArray = explode("|", $keyString);
            $reverseKeyArray = array_reverse($keyArray);
            $reverseKeyString = implode("|", $reverseKeyArray);
            $CalcHashString = strtolower(hash('sha512', $salt . '|' . $status . '|' . $reverseKeyString));


            if ($status == 'success' && $resphash == $CalcHashString) {
                $msg = "Transaction Successful and Hash Verified...";
                //Do success order processing here...
                $order->payment_status = 'paid';
                $order->save();
                Cart::emptyCart($order->user_id);
            } else {
                //tampered or failed
                $msg = "Payment failed for Hasn not verified...";
            }
            return view('payment.response',['msg' => $msg]);
        }
    }
}
