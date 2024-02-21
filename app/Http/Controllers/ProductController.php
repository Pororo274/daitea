<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($categoryId = $request->query('c')) {
            $query->where('category_id', $categoryId);
        }

        $categories = Category::query()->get();
        $products = $query->get();

        return view('pages.index', [
            'categories' => $categories,
            'products' => $products,
            'currentCategory' => +$categoryId
        ]);
    }

    public function create()
    {
        $categories = Category::query()->get();

        return view('pages.products.create', [
            'categories' => $categories
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $imagePath = $request->file('image')->store('products');

        Product::query()->create([
            ...$request->only(['name', 'price', 'description', 'category_id']),
            'image_path' => $imagePath
        ]);

        return redirect()->route('product.index');
    }
}
