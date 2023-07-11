<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $coupon = Coupon::all();
        return view('adminpanel::coupon.index',['coupon'=>$coupon]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('adminpanel::coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
                'title' => 'required',
                'code' => 'required|unique:coupons,code,id',
                'type' => 'required',
                'amount' => 'required',
                'valid_upto' => 'required'
        ]);
        $coupon = new Coupon();
        $coupon->title = $validate['title'];
        $coupon->code = $validate['code'];
        $coupon->type = $validate['type'];
        $coupon->amount = $validate['amount'];
        $coupon->valid_upto = date('Y-m-d',strtotime($validate['valid_upto']));
        $coupon->save();
        return redirect()->route('admin.coupon.index')->with('success');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('adminpanel::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('adminpanel::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupon.index')->with('success');
    }
}
