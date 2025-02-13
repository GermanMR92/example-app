<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Product;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    function new()
    {
        $categories = Category::all();
        return inertia('partners/Create', [
            'categories' => $categories
        ]);
    }

    function store(StorePartnerRequest $request)
    {
        // dd($request->all());
        try {
            $partner = new Partner();

            $fields = $request->only($partner->getFillable());
            $partner->fill($fields);

            $partner->save();

            $categories = $request->input('categories');
            if ($categories) {
                $partner->categories()->attach($categories);
            }

            return redirect('/')->with('success', 'Partner created');

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while creating the partner',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function update(StorePartnerRequest $request, $id)
    {
        try {
            $partner = Partner::findOrFail($id);

            if (!$partner) {
                return response()->json(['error' => 'partner not found'], 404);
            }
    
            $fields = $request->only($partner->getFillable());
            $partner->fill($fields);

            $partner->update();

            $categories = $request->input('categories');
            if ($categories) {
                $partner->categories()->sync($categories);
            }
    
            return redirect('/')->with('success', 'Partner updated');

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while updating the partner',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function edit($id)
    {
        $partner = Partner::find($id)->load('categories');
        $categories = Category::all();
        return inertia('partners/Edit', [
            'partner' => $partner,
            'categories' => $categories
        ]);
    }

    function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);

            if (!$partner) {
                return response()->json(['error' => 'Partner not found'], 404);
            }

            $partner->delete();

            return redirect('/')->with('message', 'Partner deleted');

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while deleting the partner',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    // Generate a JSON with the products of the categories associated to the partner
    function getPartnerProducts($id)
    {
        try {

            $partner = Partner::findOrFail($id);

            if (!$partner) {
                return response()->json(['error' => 'Partner not found'], 404);
            }

            $products = Product::whereHas('categories', function ($query) use ($partner) {
                $query->whereIn('category_id', $partner->categories()->pluck('categories.id'));
            })->get();


            return response()->json($products);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while generating JSON',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
