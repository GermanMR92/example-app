<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function new()
    {
        echo 'new from ProductController'; // TODO: retornar vista form con method
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

            return response()->json([
                'message' => 'Product created',
                'product' => $product
            ]);

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

            return response()->json([
                'message' => 'Product updated',
                'product' => $product
            ]);

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
        echo 'edit from ProductController'; // TODO: retornar vista form con method
    }

    function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if (!$product) {
                return response()->json(['error' => 'Product not found'], 404);
            }

            $product->delete();
            
            return response()->json(['message' => 'Product deleted']);

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while deleting the product',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
