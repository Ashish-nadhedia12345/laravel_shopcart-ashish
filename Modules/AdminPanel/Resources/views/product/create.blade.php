@extends('adminpanel::layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Create Product</h1>
        <form action="{{ route('admin.product.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('adminpanel::layouts.form-errors')
            <table class="table table-bordered">
                <tr>
                    <td>
                        <select name="cat_id" id="" class="form-control">
                            @foreach ($category as $row )
                            <option value="{{$row->id}}">{{$row->title}}</option>     
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="title" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="image" placeholder="image" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number" name="price" min="0" placeholder="price" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
