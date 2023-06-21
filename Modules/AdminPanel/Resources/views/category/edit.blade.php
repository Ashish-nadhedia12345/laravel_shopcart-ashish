@extends('adminpanel::layouts.master')
@section('content')
    <div class="container-fluid">
        <h1>Edit Category : {{ $category->title }}</h1>
        <form action="{{ route('admin.category.edit', $category->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            @include('adminpanel::layouts.form-errors')
            <table class="table table-bordered">
                <tr>
                    <td>
                        <select name="parent_id" id="" class="form-control">
                            <option {{ $category->parent_id == 0 ? 'selected="selected"': '' }}value="0">Root</option>
                            @foreach ($categories as $row)
                                <option
                                    {{ $row->id == $category->parent_id ? 'selected="selected"' : '' }}value="{{ $row->id }}">
                                    {{ $row->title }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="title" class="form-control"
                            value="{{ $category->title }}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control"
                            placeholder="description">{{ $category->description }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="file" name="image" placeholder="image" class="form-control">
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
