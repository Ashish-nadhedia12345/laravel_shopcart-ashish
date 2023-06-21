<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
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
        $page = Page::all();
        return view('adminpanel::page.index',['page'=> $page]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $category= Category::all();
        return view('adminpanel::page.create',['category'=>$category]);
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
        $cat = new Page();
        $cat->title = $validate['title'];
        $cat->description = $validate['description'];
        $cat->price = $validate['price'];
        $cat->cat_id = $validate['cat_id'];
        $cat->image = $imageName;
        $cat->save();
        return redirect()->route('admin.page.index')->with('success', 'page created');
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
    public function edit(Page $page)
    {
        $category = Category::all();
        return view('adminpanel::page.edit',['page'=>$page,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Page $page)
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
        $page->title = $validate['title'];
        $page->description = $validate['description'];
        $page->price = $validate['price'];
        $page->image = $imageName;
        $page->cat_id = $validate['cat_id'];
        $page->save();
        return redirect()->route('admin.page.index')->with('success', 'page created');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.page.index')->with('success', 'page delete');
    }
}
