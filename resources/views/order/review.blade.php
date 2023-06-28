@extends('layouts.main')
@section('content')
    <form action="" method="post">
        @csrf
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            @foreach ($orderDetail as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ $row->price }}</td>
                    <td>{{ $row->qty }}</td>
                    <td>{!! $row->qty * $row->price !!}</td>
                    
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-right">Shipping</td>
                <td>${{ env('SHIPPING_AMT') }}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Grand Total</td>
                <td>${{ $order->amount}}</td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <a href="{{ route('payment.step1', $order->id)}}" class="btn btn-primary">Confirm and Pay</a>
                </td>
            </tr>
        </table>
    </form>
@endsection
