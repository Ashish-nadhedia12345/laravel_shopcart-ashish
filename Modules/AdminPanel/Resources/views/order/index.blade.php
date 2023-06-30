@extends('adminpanel::layouts.master')

@section("content")
<h1>Orders</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Payment Status</th>
            <th>Order Status</th>
            <th>
                <div class="row">
                    <div class="col-4">Change Payment Status</div>
                    <div class="col-4">Chagen Order Status</div>
                    <div class="col-4"></div>
                </div>
            </th>
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
                <form name="updateStatus" id="updateStatus" method="post" action="{{ route('admin.order.update')}}">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ $order->id }}">

                    <div class="row">
                        <div class="col-4">
                            <select name="payment_status" id="" class="form-control">
                                <option value="">Select Any</option>
                                <option {!! $order->payment_status == 'paid' ? 'selected="selected"' : '' !!} value="paid">Paid</option>
                                <option {!! $order->payment_status == 'unpaid' ? 'selected="selected"' : '' !!} value="unpaid">unpaid</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <select name="order_status" id="" class="form-control">
                                <option value="">Select Any</option>
                                <option {!! $order->order_status == 'in progress' ? 'selected="selected"' : '' !!} value="in progress">In progress</option>
                                <option {!! $order->order_status == 'shipped' ? 'selected="selected"' : '' !!} value="shipped">Shipped</option>
                                <option {!! $order->order_status == 'confirmed' ? 'selected="selected"' : '' !!} value="confirmed">Confirmed</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary btn-sm" type="submit">Update Order</button>
                            <a target="_blank" href="{{ route('admin.order.invoice',$order->id) }}" class="btn btn-sm btn-warning">Download Invoice</a>
                        </div>
                    </div>

                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
