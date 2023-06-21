<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $request->input('search');
        $catId = $request->input('cat_id');
        $query = Page::select('*');
        if(!empty($search)){
            $query = Page::where('title', 'LIKE', "%".$search."%")->get();
        }else{
            if(!empty($catId)){
                $query->where('cat_id','=', $catId);
            }
            $pages = $query->orderBy("id", "DESC")->paginate(10);
        }
       
        return view('search', ['pages'=>$pages]);
    }

}
