<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::latest()->get()->toJson();
    }

    public function show(Category $category)
    {
        return $category->toJson();
    }

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return self::index();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return self::index();
    }
}
