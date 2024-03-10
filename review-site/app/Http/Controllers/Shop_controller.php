<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class Shop_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Shop::all();
        $categories = Category::all()->pluck('category', 'id')->all();
        return view('admin/shops.adminShops', ['shops' => $shops, 'categories' => $categories]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('admin/shops.addShop', ['categories' => $categories]);
    }

    public function store(ShopRequest $request): \Illuminate\Http\RedirectResponse
    {
        $imageName = $request->title .'.'. $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $otherData = $request->except('img');
        Shop::create(['img' => $imageName] + $otherData);
        return redirect()->route('shops.index')->with('success', 'Shop created successfully.');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $shop = Shop::find($id);
        $categories = Category::all()->pluck('category', 'id')->all();

        return view('admin/shops.editShop', ['shop' => $shop, 'categories' => $categories]);
    }

    public function update(ShopRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $shop = Shop::find($id);
        $otherData = $request->except('img');

        $imageName = $request->img;
        if ($request->new_img) {
            $imageName = $request->title .'.'. $request->new_img->extension();
            $request->new_img->move(public_path('images'), $imageName);
        }

        $shop->update(['img' => $imageName] + $otherData);
        return redirect()->route('shops.index')->with('success', 'Shop updated successfully.');
    }

    public function destroy($id)
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->route('shops.index')->with('success', 'Shop deleted successfully');
    }
}
