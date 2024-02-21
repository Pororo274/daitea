<?php

namespace App\Http\Controllers;

use App\Helpers\InputHelper;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('pages.categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        Category::query()->create($request->only(['name']));

        return redirect()->route('product.index');
    }

    public function edit(int $categoryId)
    {
        $category = Category::query()->find($categoryId);

        InputHelper::setOldIfNotDefined('name', $category['name']);

        return view('pages.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(UpdateCategoryRequest $request, int $categoryId)
    {
        Category::query()->where('id', $categoryId)->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('product.index');
    }

    public function delete(int $categoryId)
    {
        Category::query()->where('id', $categoryId)->delete();

        return redirect()->route('product.index');
    }
}
