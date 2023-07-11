@extends('layouts.main')
@section('content')

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
                <td>${{ $shippingPrice }}</td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Grand Total</td>
                <td>
                    @if($order->coupon_code !== NULL)
                    <strike class="text-danger">${{ $order->amount}}</strike> &nbsp; <span class="text-success">${{ $order->discounted_amount }}</span>
                    @else
                    ${{ $order->amount}}
                    @endif

                </td>
            </tr>
            <tr>
                <td colspan="4" class="text-right">Coupon</td>
                <td>
                    <form action="{{ route('order.applyCoupon', $order->id) }}" method="get">
                        @csrf
                        <input type="hidden" name="address" value="{{ $order->address_id }}">
                        <div class="row">
                            <div class="col-6"> <input type="text" name="coupon_code" value="{!! $order->coupon_code !== NULL ? $order->coupon_code : '' !!}"/></div>
                            <div class="col-6"><button type="submit" class="btn btn-primary">Apply</button></div>
                        </div>


                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="4"></td>
                <td>
                    <a href="{{ route('payment.step1', $order->id)}}" class="btn btn-primary">Confirm and Pay</a>
                </td>
            </tr>
        </table>

@endsection
