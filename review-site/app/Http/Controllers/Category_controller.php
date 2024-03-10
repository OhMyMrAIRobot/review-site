<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Category_controller extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();

        return view('admin/categories.adminCategory', ['categories' => $categories]);
    }

    public function create(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        return view('admin/categories.addCategory');
    }

    public function store(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $category = Category::find($id);
        return view('admin/categories.editCategory', ['category' => $category]);
    }

    public function update(CategoryRequest $request, $id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }
}
