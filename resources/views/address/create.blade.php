@extends('layouts.main')
@section('content')
    <div class="container-fluid">
        <div>
            <h1>Add New Address</h1>
        </div>
        @include('layouts.form-errors')
        <form action="{{ url('/address/create') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <tr>
                    <td>
                        <input type="text" name="address_line1" placeholder="address_line-1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="address_line2" placeholder="address_line-2">
                    </td>
                </tr>
                <tr>
                    <td> <input type="text" name="city" placeholder="city">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="pincode" placeholder="pincode">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="state" placeholder="state">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="country" placeholder="country">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn  btn-sm btn-primary">Save</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
@endsection
