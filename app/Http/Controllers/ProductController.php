<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function new()
    {
        $categories = Category::all();
        return inertia('products/Create', [
            'categories' => $categories
        ]);
    }

    function store(StoreProductRequest $request)
    {
        try {

            DB::beginTransaction();

            $product = new Product();

            $fields = $request->only($product->getFillable());
            $product->fill($fields);

            $product->save();

            $categories = $request->input('categories');
            if ($categories) {
                $product->categories()->attach($categories);
            }

            DB::commit();

            return redirect('/')->with('success', 'Product created');
            // return response()->json([
            //     'message' => 'Product created',
            //     'product' => $product
            // ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'An error occurred while creating the product',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function update(StoreProductRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $fields = $request->only($product->getFillable());
            $product->fill($fields);

            $product->update();

            $categories = $request->input('categories');
            if ($categories) {
                $product->categories()->sync($categories);
            }

            return redirect('/')->with('success', 'Product updated');
            // return response()->json([
            //     'message' => 'Product updated',
            //     'product' => $product
            // ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'An error occurred while updating the product',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function edit($id)
    {
        $product = Product::find($id)->load('categories');
        $categories = Category::all();

        return inertia('products/Edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $product->delete();
            
            return redirect('/')->with('message', 'Product deleted');

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while deleting the product',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
