<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Diet;
use App\Http\Requests\StoreDietRequest;
use App\Http\Requests\UpdateDietRequest;
use App\Http\Resources\V1\DietResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class DietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DietResource::collection(Diet::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDietRequest $request)
    {
        return new DietResource(Diet::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Diet $diet)
    {
        try {
            $diet = Diet::findOrFail($diet->id);

            return new DietResource($diet);

        } catch (ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'The Diet was not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDietRequest $request, Diet $diet)
    {
        $request->validated();
        $diet->update($request->all());

        return new DietResource(Diet::find($diet));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Diet $diet)
    {
        $diet->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
