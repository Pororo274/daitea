<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\InputHelper;
use App\Http\Requests\UpdateProductRequest;

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

    public function edit(int $productId)
    {
        $product = Product::query()->find($productId);
        $categories = Category::query()->get();

        if (is_null($productId)) {
            abort(404);
        }

        InputHelper::setOldsIfNotDefined([
            'name' => $product['name'],
            'price' => $product['price'],
            'description' => $product['description'],
            'category_id' => $product['category_id']
        ]);

        return view('pages.products.edit', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    public function update(UpdateProductRequest $request, int $productId)
    {
        $values = $request->only(['name', 'price', 'description', 'category_id']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products');
            $values['image_path'] = $imagePath;
        }

        Product::query()->where('id', $productId)->update($values);

        return redirect()->route('product.index');
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

    public function show(int $productId)
    {
        $product = Product::query()->find($productId);

        if (is_null($product)) {
            abort(404);
        }

        return view('pages.products.product', [
            'product' => $product
        ]);
    }

    public function delete(int $productId)
    {
        Product::query()->where('id', $productId)->delete();

        return redirect()->route('product.index');
    }
}
