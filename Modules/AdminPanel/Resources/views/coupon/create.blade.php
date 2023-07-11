@extends('adminpanel::layouts.master')
@section('content')
    <h2>Create Coupon</h2>
    <div class="container">
        <form action="{{ route('admin.coupon.create') }}" method="post">
            @csrf
            @include('adminpanel::layouts.form-errors')
            <table class="table table-bordered">
                <tr>
                    <td>
                        <input type="text" name="title" placeholder="title" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="code" placeholder="code" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="type" id="" class="form-control">
                            <option value="fixed">Fixed</option>
                            <option value="percent">Percentage</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="number"   min="0" step=".1" name="amount" placeholder="amount" class="form-control">
                    </td>
                </tr>
                <tr>
                    <td>
                      <input type="date" name="valid_upto" min="{!! date('Y-m-d', strtotime('+3 days')) !!}" class="form-control">
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
