<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        Product::create($request->all());
        return self::all($request->category_id);
    }

    public function all($id)
    {
        $products = Product::where('category_id', $id)->get()->toJson();
        return $products;
    }

    public function show(Product $product)
    {
        return $product->toJson();
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return self::all($request->category_id);
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return self::all($product->id);
    }
}
