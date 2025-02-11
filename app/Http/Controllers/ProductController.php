<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function new()
    {
        echo 'new from ProductController'; // TODO: retornar vista form con method
    }

    function store(StoreProductRequest $request)
    {
        $product = new Product();
        $fields = $request->only($product->getFillable());

        $product->fill($fields);
        $product->save();

        return response()->json([
            'message' => 'Product created',
            'product' => $product
        ]);
    }

    function update(StoreProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $fields = $request->only($product->getFillable());
        $product->fill($fields);
        $product->update();

        return response()->json([
            'message' => 'Product updated',
            'product' => $product
        ]);
    }

    function edit($id)
    {
        echo 'edit from ProductController'; // TODO: retornar vista form con method
    }

    function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
