<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class MainPage_controller extends Controller
{
    public function index()
    {
        $shops = Shop::all();
        $categories = Category::all()->pluck('category', 'id')->all();
        return view('main.index', ['shops' => $shops, 'categories' => $categories]);
    }
}
