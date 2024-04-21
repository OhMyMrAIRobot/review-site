<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Shop;
use App\Models\User;
use App\Utils\Translate;

class ShopPage_controller extends Controller
{
    public function index($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $shop = Shop::find($id);
        Translate::translateFields($shop, ['description']);

        $avg = $this->getShopRating($shop->id);
        $shop->rating = $avg;
        $shop->percentage = $this->getPercentage($shop->id);

        if ($shop->category_id) {
            $category = Category::where('id', $shop->category_id)->first()->category;
            Translate::translateFields($category, null);
        } else {
            $category = "Нет категории";
        }

        $reviews = Review::where('shop_id', $id)->orderBy('created_at', 'desc')->paginate(6);

        Translate::translateFields($reviews, ['title', 'description']);

        foreach ($reviews as $review){
            $author = User::where('id', $review->user_id)->first()->username;
            $review->author = $author;
        }
        $reviews->withPath($id);

        return view('main/shopPage', [
            'shop' => $shop,
            'category' => $category,
            'reviews' => $reviews,
            'reviewsCount' => $reviews->total(),
        ]);
    }

    function getPercentage($id): array
    {
        $result = [];
        $reviews = Review::where('shop_id', $id)->get();
        $total = count($reviews);

        if ($total === 0) {
            return $result;
        }

        $ratingsCount = array_count_values($reviews->pluck('rating')->toArray());
        for ($i = 1; $i <= 5; $i++) {
            $percentage = isset($ratingsCount[$i]) ? ($ratingsCount[$i] / $total) * 100 : 0;
            $result[$i] = round($percentage, 1);
        }
        return $result;
    }

}
