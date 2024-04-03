<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Http\Requests\StoreFamilyRequest;
use App\Http\Requests\UpdateFamilyRequest;
use App\Http\Resources\V1\FamilyResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::latest()->paginate();

        return FamilyResource::collection($families);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFamilyRequest $request)
    {
        return new FamilyResource(Family::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        try {
            $family = Family::findOrFail($family->id);

            return new FamilyResource($family);

        } catch (ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'The family was not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyRequest $request, Family $family)
    {
        $request->validated();
        $family->update($request->all());

        return new FamilyResource(Family::find($family));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
