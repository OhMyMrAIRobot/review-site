<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
use App\Utils\Translate;

class MainPage_controller extends Controller
{
    public function index(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Shop::paginate(5);
        $shops->withPath('/');
        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }
        $categories = Category::all();
        Translate::translateFields($categories, ['category']);
        $categories = $categories->pluck('category', 'id')->all();

        $reviews = Review::orderBy('created_at', 'desc')->limit(3)->get();
        $reviewShops = [];
        foreach ($reviews as $review){
            $author = User::where('id', $review->user_id)->first()->username;
            $review->author = $author;
            $reviewShops[] = Shop::where('id', $review->shop_id)->first();
        }

        Translate::translateFields($shops, ['description']);
        Translate::translateFields($reviews, ['title', 'description']);

        return view('main.index', [
            'method' => 'all',
            'shops' => $shops,
            'categories' => $categories,
            'reviews' => $reviews,
            'reviewShops' => $reviewShops,
        ]);
    }

    public function getShopsByCategory($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Shop::where('category_id', $id)->paginate(5);
        $categories = Category::all();
        Translate::translateFields($categories, ['category']);
        $categories = $categories->pluck('category', 'id')->all();

        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }
        $shops->withPath('/category/' . $id . '/shops/');
        Translate::translateFields($shops, ['description']);

        return view('main.index', [
            'method' => 'category',
            'shops' => $shops,
            'reviews' => [],
            'categories' => $categories,
            'id' => $id,
        ]);
    }

    public function getShopsBySearch(\Illuminate\Http\Request $request)
    {
        $shops = Shop::where('title', 'like', '%' . $request->search . '%')->paginate(5);
        $shops->withPath('/shops?search=' . $request->search);

        Translate::translateFields($shops, ['description']);

        $categories = Category::all();
        Translate::translateFields($categories, ['category']);
        $categories = $categories->pluck('category', 'id')->all();

        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }

        return view('main.index', [
            'method' => 'search',
            'shops' => $shops,
            'reviews' => [],
            'categories' => $categories,
        ]);

    }
}
