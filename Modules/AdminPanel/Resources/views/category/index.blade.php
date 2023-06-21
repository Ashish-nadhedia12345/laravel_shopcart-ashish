@extends('adminpanel::layouts.master')
@section('content')
    <div class="container">
        @if ($category)
            <h1>All Category</h1>
            <div class="text-right">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create Category</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th width=10%>Id</th>
                    <th width=20%>Title</th>
                    <th width=20%>Image</th>
                    <th width=20%>Parent</th>
                    <th width=30%>Action</th>
                </tr>
                @foreach ($category as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->image }}</td>
                        <td>{{ $row->parent_id == 0 ? 'root' : $row->parent->title}}</td>
                        <td class="input-group">
                            <a href="{{ route('admin.category.edit', $row->id) }}" class="btn btn-primary">Edit</a>&nbsp;
                            <form action="{{ route('admin.category.delete', $row->id) }}" method="post">
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
