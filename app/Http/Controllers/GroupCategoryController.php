<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupCategoryController extends Controller
{
    function store(StoreGroupRequest $request)
    {
        $group = new Group();
        $fields = $request->only($group->getFillable());

        $group->fill($fields);
        $group->save();

        return response()->json([
            'message' => 'Category group created',
            'group' => $group
        ]);
    }

    function update(StoreGroupRequest $request, $id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json(['error' => 'group not found'], 404);
        }

        $fields = $request->only($group->getFillable());
        $group->fill($fields);
        $group->update();

        return response()->json([
            'message' => 'Category group updated',
            'group' => $group
        ]);
    }

    function destroy($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json(['error' => 'Category group not found'], 404);
        }

        $group->delete();
        return response()->json(['message' => 'Category group deleted']);
    }
}
