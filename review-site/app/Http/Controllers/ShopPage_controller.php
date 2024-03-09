<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;

class ShopPage_controller extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $shop = Shop::find($id);
        if (!$shop)
            return redirect()->route('main.index');
        $categories = Category::all()->pluck('category', 'id')->all();
        return view('main/shopPage', ['shop' => $shop, 'category' => $categories[$shop->category_id]]);
    }

}
