<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Fish;
use App\Http\Requests\StoreFishRequest;
use App\Http\Requests\UpdateFishRequest;
use App\Http\Resources\V1\FishResource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class FishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return FishResource::collection(Fish::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFishRequest $request)
    {
        $photo = $request->file('photo')->store('public/images');
        $url = Storage::url($photo);

        $fish = new Fish();

        return new FishResource($fish->create([
            'name' => $request->name,
            'scientific_name' => $request->scientific_name,
            'size' => $request->size,
            'longevity' => $request->longevity,
            'description' => $request->description,
            'temper' => $request->temper,
            'family_id' => $request->family_id,
            'gender_id' => $request->gender_id,
            'photo' => $url
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Fish $fish)
    {
        return new FishResource(Fish::findOrFail($fish->id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFishRequest $request, Fish $fish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fish $fish)
    {
        $pathPhoto = $fish->photo;
        
        if (Storage::exists($pathPhoto)) {
            Storage::delete($pathPhoto);
        };

        $fish->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
