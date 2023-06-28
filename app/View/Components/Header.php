<?php

namespace App\View\Components;

use App\Models\Cart;
use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        $categories = Category::all();
        $cartItemCount = 0;
        if (isset(Auth::user()->id)) {
            $cartItemCount = Cart::where('user_id', Auth::user()->id)->count();
        }

        return view('components.header', ['categories' => $categories, 'cartItemCount' => $cartItemCount]);
    }
}
