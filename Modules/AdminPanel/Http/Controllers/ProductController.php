<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $product = Product::all();
        return view('adminpanel::product.index',['product'=> $product]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $category= Category::all();
        return view('adminpanel::product.create',['category'=>$category]);
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
            'description' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,svg',
        ]);
        $imageName = uniqid() . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images', $imageName));
        $cat = new Product();
        $cat->title = $validate['title'];
        $cat->description = $validate['description'];
        $cat->price = $validate['price'];
        $cat->cat_id = $validate['cat_id'];
        $cat->image = $imageName;
        $cat->save();
        return redirect()->route('admin.product.index')->with('success', 'product created');
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
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('adminpanel::page.edit',['product'=>$product,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Product $product)
    {
          $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'cat_id' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,svg',
        ]);
        $imageName = uniqid() . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images', $imageName));
        $product->title = $validate['title'];
        $product->description = $validate['description'];
        $product->price = $validate['price'];
        $product->image = $imageName;
        $product->cat_id = $validate['cat_id'];
        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'product created');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'product delete');
    }
}
