@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php $sum = 0 ;  @endphp
                        @foreach ($carts as $cart)
                            @php
                                $sum += $cart->product->price * $cart->qty;
                            @endphp
                            <tr>
                                <td class="align-middle"><img src="{{ asset('/images/' . $cart->product->image) }}"
                                        alt="" style="width: 50px;"></td>
                                <td class="align-middle">{{ $cart->product->title }}</td>
                                <td class="align-middle">${{ $cart->product->price }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 200px;">
                                        <input type="number" min="1" name="qty" value="{{ $cart->qty }}">
                                    </div>
                                </td>
                                <td class="align-middle">${{ $cart->product->price * $cart->qty }}</td>

                                <td class="align-middle">
                                    <a href="{{ url('delete', $cart->id) }}">
                                        <button class="btn btn-sm btn-danger">Remove</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>${!! $sum !!}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>${{ $sum + $shippingPrice }}</h5>
                        </div>
                        <a href="{{ url('address')}}">
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                                Checkout</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
