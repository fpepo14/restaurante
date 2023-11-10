<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories'=>$categories]);
    }
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->save();
        return redirect('/categorias');
    }
    public function show($id)
    {
        $category = Category::find($id);
        return view('category.show', ['category'=>$category]);
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect('/categorias');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id);
        $products->delete();
        $category->delete();
        return redirect('/categorias');
    }
}
