<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupCategoryController extends Controller
{
    function store(StoreGroupRequest $request)
    {
        try {

            DB::beginTransaction();

            $group = new Group();

            $fields = $request->only($group->getFillable());
            $group->fill($fields);
            
            $group->save();

            $categories = $request->input('categories');
            if ($categories) {
                $group->categories()->attach($categories);
            }

            DB::commit();

            return response()->json([
                'message' => 'Category group created',
                'group' => $group
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'An error occurred while creating the group',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function update(StoreGroupRequest $request, $id)
    {
        try {
            $group = Group::findOrFail($id);

            if (!$group) {
                return response()->json(['error' => 'group not found'], 404);
            }

            $fields = $request->only($group->getFillable());
            $group->fill($fields);

            $group->update();

            $categories = $request->input('categories');
            if ($categories) {
                $group->categories()->sync($categories);
            }

            return response()->json([
                'message' => 'Category group updated',
                'group' => $group
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while updating the group',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function destroy($id)
    {
        try {
            $group = Group::find($id);

            if (!$group) {
                return response()->json(['error' => 'Category group not found'], 404);
            }

            $group->delete();
            return response()->json(['message' => 'Category group deleted']);

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while deleting the group',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    // Generate a JSON with the products of the categories associated to the group
    function getGroupProducts($id)
    {
        try {

            $group = Group::findOrFail($id);

            if (!$group) {
                return response()->json(['error' => 'Partner not found'], 404);
            }

            $products = Product::whereHas('categories', function ($query) use ($group) {
                $query->whereIn('category_id', $group->categories()->pluck('categories.id'));
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
