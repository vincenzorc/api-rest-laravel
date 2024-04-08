<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Aquarium;
use App\Http\Requests\StoreAquariumRequest;
use App\Http\Requests\UpdateAquariumRequest;
use App\Http\Resources\V1\AquariumResource;
use Illuminate\Http\Response;

class AquariumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AquariumResource::collection(Aquarium::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAquariumRequest $request)
    {
        return new AquariumResource(Aquarium::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Aquarium $aquarium)
    {
        return new AquariumResource(Aquarium::findOrFail($aquarium->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAquariumRequest $request, Aquarium $aquarium)
    {
        $aquarium->update($request->validated());

        return new AquariumResource(Aquarium::find($aquarium));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aquarium $aquarium)
    {
        $aquarium->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
