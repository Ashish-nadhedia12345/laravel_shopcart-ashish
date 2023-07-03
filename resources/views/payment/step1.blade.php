@extends('layouts.main')
@section("content")
@php
$orderID = $order->id;
$key = 'fcZxr6';
$salt = 'xBJpv25HH6q8saJOimBllTHPpVj5iHno';
$mid = 'wIEUUgWk0j';
$amount = $order->coupon_code !='' ? $order->discounted_amount : $order->amount;
$productInfo = 'Purchase Items';
$firstname = "Asihsh";
$lastname = "Nadhediya";
$email = 'test@gmail.com';
$phone = '8233142631';
$text = $key . '|' . $order->id . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||||||||' . $salt;
$hash = hash("sha512", $text);
@endphp
<form action='https://test.payu.in/_payment' method='post' enctype="multipart/form-data">
    <input type="text" name="key" value="{{ $key }}" />
    <input type="text" name="txnid" value="{{ $order->id }}" />
    <input type="text" name="productinfo" value="{{ $productInfo }}" />
    <input type="text" name="amount" value="{{ $amount }}" />
    <input type="text" name="email" value="{{ $email }}" />
    <input type="text" name="firstname" value="{{ $firstname }}" />
    <input type="text" name="lastname" value="{{ $lastname }}" />
    <input type="text" name="surl" value="{{ route('payment.response',$order->id) }}" />
    <input type="text" name="furl" value="{{ route('payment.response',$order->id) }}" />
    <input type="text" name="phone" value="{{ $phone }}" />
    <input type="text" name="hash" value="{{ $hash }}" />
    <p class="text-right">
        <input type="submit" class="btn btn-primary" value="Proceed To Payment">
    </p>

</form>
@endsection
