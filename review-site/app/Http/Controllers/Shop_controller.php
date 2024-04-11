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
        $shops = Shop::orderBy('created_at', 'desc')->paginate(10);
        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }
        $shops->withPath('/admin/shops');
        $categories = Category::all()->pluck('category', 'id')->all();
        return view('admin/shops.index', ['shops' => $shops, 'categories' => $categories]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        $categories = Category::all();
        return view('admin/shops.add', ['categories' => $categories]);
    }

    public function getShopsBySearch(\Illuminate\Http\Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $shops = Shop::where('title', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(10);
        foreach ($shops as $shop) {
            $avg = $this->getShopRating($shop->id);
            $shop->rating = $avg;
        }
        $shops->withPath('?search=' . $request->search);
        $categories = Category::all()->pluck('category', 'id')->all();
        return view('admin/shops.index', ['shops' => $shops, 'categories' => $categories]);
    }

    public function store(ShopRequest $request): \Illuminate\Http\RedirectResponse
    {
        $imageName = $request->title .'.'. $request->img->extension();
        $request->img->move(public_path('images'), $imageName);
        $otherData = $request->except('img');
        Shop::create(['img' => $imageName] + $otherData);
        return redirect()->route('shops.index')->with('status_ok', 'Shop created successfully.');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $shop = Shop::find($id);
        $categories = Category::all()->pluck('category', 'id')->all();

        return view('admin/shops.edit', ['shop' => $shop, 'categories' => $categories]);
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
        return redirect()->route('shops.index')->with('status_ok', 'Shop updated successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $shop = Shop::find($id);
        $shop->delete();
        return redirect()->back()->with('status_ok', 'Shop deleted successfully');
    }
}
