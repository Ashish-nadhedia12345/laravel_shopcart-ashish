@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between">
          <img src="{{asset('/images/'.$page->image)}}" alt="" class="rounded" width="500">
          <div>
            <div class="card" style="width: 30rem">
                <div class="card-body">
                    <h5 class="card-title">{{$page->title}}</h5>
                    <p class="card-text">{{$page->description}}</p>
                    <p class="card-text">${{$page->price}}</p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <input type="number" name="qty" min="1">
                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                    </form>
                </div>
            </div>
          </div>
    </div>
@endsection
