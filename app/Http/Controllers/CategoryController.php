<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $fields = $request->only($category->getFillable());

        $category->fill($fields);
        $category->save();

        return response()->json([
            'message' => 'Category created',
            'category' => $category
        ]);
    }

    function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $fields = $request->only($category->getFillable());
        $category->fill($fields);
        $category->update();

        return response()->json([
            'message' => 'category updated',
            'category' => $category
        ]);
    }

    function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
