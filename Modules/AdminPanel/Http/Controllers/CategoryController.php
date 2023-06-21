<?php

namespace Modules\AdminPanel\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    { 
        $category = Category::all();
        return view('adminpanel::category.index', ['category' => $category] );
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $category = Category::where('parent_id','=','0')->get();
        return view('adminpanel::category.create',['category' => $category] );
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
            'parent_id'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,svg',
        ]);
        $imageName = uniqid() . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images', $imageName));
        $cat = new Category();
        $cat->title = $validate['title'];
        $cat->parent_id = $validate['parent_id'];
        $cat->description = $validate['description'];
        $cat->image = $imageName;
        $cat->save();
        return redirect()->route('admin.category.index')->with('success', 'category created');
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
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id','=','0')->get();
        return view('adminpanel::category.edit', ['category' => $category,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'parent_id'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,svg',
        ]);
        $imageName = uniqid() . time() . '.' . $request->image->extension();
        $request->image->move(public_path('images', $imageName));
        $category->title = $validate['title'];
        $category->description = $validate['description'];
        $category->parent_id = $validate['parent_id'];
        $category->image = $imageName;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'category updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('danger', 'category deleted');
    }
}
