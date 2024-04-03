<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\V1\CountryResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CountryResource::collection(Country::latest()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        return new CountryResource(Country::create($request->validated()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        try {
            $country = Country::findOrFail($country->id);

            return new CountryResource($country);

        } catch (ModelNotFoundException $e) {
            
            return response()->json([
                'error' => 'The Country was not found',
            ], Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $request->validated();
        $country->update($request->all());

        return new CountryResource(Country::find($country));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
