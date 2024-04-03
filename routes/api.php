<?php

use App\Http\Controllers\V1\FamilyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); */

//Route::apiResource('/families', FamilyController::class);

Route::prefix('v1')->group(function () {
    Route::apiResource('/families', FamilyController::class);
});