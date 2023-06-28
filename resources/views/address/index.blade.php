@extends('layouts.main')
@section('content')
    <div class="container">
        <h1> Choose Billing Address</h1>
        <div class="float-right"><a href="{{ url('/address/create') }}" class="btn btn-primary">Create Address</a>
        </div>
        <form action="{{ route('order.review')}}" method="get">
            @csrf
            <div class="row row-cols-4 gx-3">
                @if ($address)
                    @foreach ($address as $item)
                        <div class="col mb-3 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    {{ $item->address_line1 }}
                                    <div class="text-right">
                                        <input type="radio" name="address" value="{{ $item->id }}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{ $item->address_line1 }},<br>
                                    {{ $item->address_line2 }},<br>
                                    {{ $item->city }},<br>
                                    {{ $item->pincode }},<br>
                                    {{ $item->state }},<br>
                                    {{ $item->country }}
                                </div>
                                <div class="card-footer">                                    
                                        <button type="button" class="btn btn-danger">Delete</button>                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row border mb-3 py-3">
                <div class="col">
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Proceeed</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
