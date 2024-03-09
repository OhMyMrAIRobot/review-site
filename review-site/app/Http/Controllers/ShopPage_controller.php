<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Shop;

class ShopPage_controller extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $shop = Shop::find($id);
        if (!$shop)
            return redirect()->route('main.index');

        $avg = $this->getShopRating($shop->id);
        $shop->rating = $avg;

        $category = Category::where('id', $shop->category_id)->first()->category;
        $reviews =  Review::where('shop_id', $id)->orderBy('created_at', 'desc')->get();

        return view('main/shopPage', [
            'shop' => $shop,
            'category' => $category,
            'reviews' => $reviews,
        ]);
    }

}
