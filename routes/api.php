<?php

use App\Http\Controllers\V1\AquariumController;
use App\Http\Controllers\V1\CountryController;
use App\Http\Controllers\V1\DietController;
use App\Http\Controllers\V1\FamilyController;
use App\Http\Controllers\V1\FishController;
use App\Http\Controllers\V1\GenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

//Route::apiResource('/families', FamilyController::class);

Route::prefix('v1')->group(function () {
    Route::apiResource('/families', FamilyController::class);
    Route::apiResource('/genders', GenderController::class);
    Route::apiResource('/diets', DietController::class);
    Route::apiResource('/countries', CountryController::class);
    Route::apiResource('/fish', FishController::class);
    Route::post('/fish/{fish}',  [FishController::class, 'updatePhoto']);
    Route::apiResource('/aquarium', AquariumController::class);
});