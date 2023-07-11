<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShippingRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $products = Product::where('cat_id', '=', $category->id)->paginate(10);
        return view('category.index', ['products' => $products]);
    }
}
