@extends('adminpanel::layouts.master')
@section('content')
    <div class="container">
        @if ($product)
            <h1>All Product</h1>
            <div class="text-right">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create Product</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th width=10%>Id</th>
                    <th width=30%>Title</th>
                    <th width=30%>Image</th>
                    <th width=30%>Action</th>
                </tr>
                @foreach ($product as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->image }}</td>
                        <td class="input-group">
                            <a href="{{ route('admin.product.edit', $row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
                            <form action="{{ route('admin.product.delete', $row->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
