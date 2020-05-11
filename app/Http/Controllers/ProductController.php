<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::latest()->get()->toJson();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $products = Product::where('category_id', $id)->get()->toJson();
        return $products;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        $products = self::index();
        return $products;
    }
}
