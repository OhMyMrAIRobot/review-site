<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Category_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        $categories->withPath('/admin/categories');
        return view('admin/categories.index', ['categories' => $categories]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin/categories.add');
    }

    public function getCategoriesBySearch(\Illuminate\Http\Request $request)
    {
        $categories = Category::where('category', 'like', '%' . $request->search . '%')->orderBy('created_at', 'desc')->paginate(8);
        $categories->withPath('?search=' . $request->search);
        return view('admin/categories.index', ['categories' => $categories]);
    }

    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('categories.index')->with('status_ok', 'Category created successfully.');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);
        return view('admin/categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('status_ok', 'Category updated successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('status_ok', 'Category deleted successfully');
    }
}
