<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function store(StoreCategoryRequest $request)
    {
        try {
            $category = new Category();

            $fields = $request->only($category->getFillable());
            $category->fill($fields);

            $category->save();

            return response()->json([
                'message' => 'Category created',
                'category' => $category
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the category',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function update(StoreCategoryRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);

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

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while creating the category',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function destroy($id)
    {
        try {
            $category = Category::find($id);

            if (!$category) {
                return response()->json(['error' => 'Category not found'], 404);
            }

            $category->delete();

            return response()->json(['message' => 'Category deleted']);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while deleting the category',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
