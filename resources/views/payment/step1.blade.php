@extends('layouts.main')
@section("content")
@php
$orderID = $order->id;
$key = 'fcZxr6';
$salt = 'xBJpv25HH6q8saJOimBllTHPpVj5iHno';
$mid = 'wIEUUgWk0j';
$amount = $order->amount;
$productInfo = 'Purchase Items';
$firstname = "Asihsh";
$lastname = "Nadhediya";
$email = 'test@gmail.com';
$phone = '8233142631';
$text = $key . '|' . $order->id . '|' . $amount . '|' . $productInfo . '|' . $firstname . '|' . $email . '|||||||||||' . $salt;
$hash = hash("sha512", $text);
@endphp
<form action='https://test.payu.in/_payment' method='post' enctype="multipart/form-data">
    <input type="hidden" name="key" value="{{ $key }}" />
    <input type="hidden" name="txnid" value="{{ $order->id }}" />
    <input type="hidden" name="productinfo" value="{{ $productInfo }}" />
    <input type="hidden" name="amount" value="{{ $amount }}" />
    <input type="hidden" name="email" value="{{ $email }}" />
    <input type="hidden" name="firstname" value="{{ $firstname }}" />
    <input type="hidden" name="lastname" value="{{ $lastname }}" />
    <input type="hidden" name="surl" value="{{ route('payment.response',$order->id) }}" />
    <input type="hidden" name="furl" value="{{ route('payment.response',$order->id) }}" />
    <input type="hidden" name="phone" value="{{ $phone }}" />
    <input type="hidden" name="hash" value="{{ $hash }}" />
    <input type="submit" value="Proceed To Payment">
</form>
@endsection
