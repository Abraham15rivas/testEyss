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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }

    public function show(Category $category)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id)->update($request->all());
        return $category;
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'message' => 'Categoría eliminada correctamente'
        ]);
    }
}
