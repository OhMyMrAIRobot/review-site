<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Shop;

class MainPage_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Shop::all();
        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }

        $shopsArr = $shops->pluck('id')->combine($shops->toArray())->all();
        $categories = Category::all()->pluck('category', 'id')->all();
        $reviews = Review::orderBy('created_at', 'desc')->limit(3)->get();

        return view('main.index', [
            'shops' => $shops,
            'categories' => $categories,
            'reviews' => $reviews,
            'shopsArr' =>$shopsArr,
        ]);
    }
}
