<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\ShippingRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addcart(Request $request, int $id)
    {
        if (Auth::user()) {
            $user = auth()->user()->id;
            $product = Product::find($id);
            $cart = new Cart;
            $cart->user_id = $user;
            $cart->product_id = $product->id;
            $cart->price = $product->price;
            $cart->qty = $request->input('qty');
            $cart->save();
            return redirect()->route('category.index');
        } else {
            return redirect('login');
        }
    }
    public function showcart()
    {
        $carts = [];
        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $carts = Cart::where('user_id', $user_id)->get();
            $weight =  Cart::getCartWeight($user_id);
            $shipping = ShippingRate::getShippingRates($weight);
        }
        return view('cart.index', ['carts' => $carts, 'shippingPrice' => $shipping]);
    }
    public function dataDelete($id)
    {
        $data = Cart::find($id);
        $data->delete();
        return redirect()->back();
    }

}
