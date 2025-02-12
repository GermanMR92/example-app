<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    function store(StorePartnerRequest $request)
    {
        try {
            $partner = new Partner();

            $fields = $request->only($partner->getFillable());
            $partner->fill($fields);

            $partner->save();

            return response()->json([
                'message' => 'Partner created',
                'partner' => $partner
            ]);

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
    
            return response()->json([
                'message' => 'Partner updated',
                'partner' => $partner
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while updating the partner',
                'details' => $e->getMessage()
            ], 500);
        }
    }

    function destroy($id)
    {
        try {
            $partner = Partner::findOrFail($id);

            if (!$partner) {
                return response()->json(['error' => 'Partner not found'], 404);
            }

            $partner->delete();
            return response()->json(['message' => 'Partner deleted']);

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'An error occurred while deleting the partner',
                'details' => $e->getMessage()
            ], 500);
        }
    }
}
