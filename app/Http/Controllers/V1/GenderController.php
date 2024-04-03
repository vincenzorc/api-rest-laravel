<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Http\Requests\StoreGenderRequest;
use App\Http\Requests\UpdateGenderRequest;
use App\Http\Resources\V1\GenderResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GenderResource::collection(Gender::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGenderRequest $request)
    {
        return new GenderResource(Gender::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gender $gender)
    {
        try {
            $gender = Gender::findOrFail($gender->id);

            return new GenderResource($gender);

        } catch (ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'The Gender was not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenderRequest $request, Gender $gender)
    {
        $request->validated();
        $gender->update($request->all());

        return new GenderResource(Gender::find($gender));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $gender)
    {
        $gender->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
