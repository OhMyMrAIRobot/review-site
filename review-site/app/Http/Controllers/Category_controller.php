<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class Category_controller extends Controller
{
    public function create(CategoryRequest $request): \Illuminate\Http\RedirectResponse
    {
        $category = new category();
        $category->category = $request->category;
        $category->save();

        return redirect()->route('adminCategoryMain');
    }
}
