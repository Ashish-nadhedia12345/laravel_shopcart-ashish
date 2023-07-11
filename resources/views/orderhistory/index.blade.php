@extends('layouts.main')
@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->order_status }}</td>
                    <td>
                            <a href="{{route('orderhistory.invoice',$order->id)}}">Download Invoice</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection