<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

</head>

<body style="margin: 20px;">
    <h1 class="text-right">Invoice</h1>
    <p class="text-right">Order #{{$order->id}}</p>
    <table class="table">
        <tr>
            <td width="50%">
                <!--user info-->
                <h3>User Information</h3>
                <p>
                    {{ $order->user->name }}<br />
                    {{ $order->user->email }}
                </p>
            </td>
            <td width="50%" class="text-right" align="right">
                <!-- Shipping info -->
                <h3 class="text-right">Shipping Information</h3>

                    {{ $order->address->address_line1 }}<br />
                    {{ $order->address->address_line2 }}<br />
                    {{ $order->address->city }}<br />
                    {{ $order->address->pincode }}<br />
                    {{ $order->address->state }}<br />
                    {{ $order->address->country }}<br />

            </td>
        </tr>

    </table>
    <table style="margin-top: 10px;">

        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th style="text-align: right;">Total</th>
        </tr>

        @foreach ($order->orderDetails as $od)
        <tr>
            <td>{{ $od->product->title }}</td>
            <td>${{ $od->price }}</td>
            <td>{{ $od->qty }}</td>
            <td style="text-align: right;">${!! $od->qty * $od->price !!}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3">Grand Total</td>
            <td style="text-align: right;">${{ $order->amount }}</td>
        </tr>


    </table>
</body>

</html>
