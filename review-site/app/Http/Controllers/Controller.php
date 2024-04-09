<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getShopRating($id): int
    {
        $count = 0;
        $sum = 0;
        $reviews =  Review::where('shop_id', $id)->get();
        foreach ($reviews as $review){
            $sum += $review->rating;
            $count++;
        }
        return $count > 0 ? floor($sum/$count) : 0;
    }

    public function changeLang($lang): \Illuminate\Http\RedirectResponse
    {
        session(['lang' => $lang]);
        App::setLocale($lang);
        return redirect()->back();
    }
}
