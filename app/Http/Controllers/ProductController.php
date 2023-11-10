<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $restaurants = Restaurant::all();
        $categories = Category::all();
        return view('product.index', ['products'=>$products, 'restaurants'=>$restaurants, 'categories'=>$categories]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->stock = $request->get('stock');
        $product->price = $request->get('price');
        $product->restaurant_id = $request->get('restaurant_id');
        $product->category_id = $request->get('category_id');
        $product->save();
        return redirect('/productos');
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->restaurant_id = $request->restaurant_id;
        $product->category_id = $request->category_id;
        $product->save();
        return redirect('/productos');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/productos');
    }
}
