<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    function store(StorePartnerRequest $request)
    {
        $partner = new Partner();
        $fields = $request->only($partner->getFillable());

        $partner->fill($fields);
        $partner->save();

        return response()->json([
            'message' => 'Partner created',
            'partner' => $partner
        ]);
    }

    function update(StorePartnerRequest $request, $id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['error' => 'partner not found'], 404);
        }

        $fields = $request->only($partner->getFillable());
        $partner->fill($fields);
        $partner->update();

        return response()->json([
            'message' => 'Partner updated',
            'partner' => $partner
        ]);
    }

    function destroy($id)
    {
        $partner = Partner::find($id);

        if (!$partner) {
            return response()->json(['error' => 'Partner not found'], 404);
        }

        $partner->delete();
        return response()->json(['message' => 'Partner deleted']);
    }
}
