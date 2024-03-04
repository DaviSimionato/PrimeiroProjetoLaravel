<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ListingController::class, "index"]);

Route::get('/listings', [ListingController::class, "index"]);

Route::get("/listings/create", [ListingController::class, "create"]);

Route::get("/listings/{id}/edit", [ListingController::class, "edit"]);

Route::get("/listings/{id}/{title}", [ListingController::class, "show"]);

Route::put("/listings/{id}", [ListingController::class, "update"]);

Route::post("/listings", [ListingController::class, "store"]);

Route::delete("/listings/{id}", [ListingController::class, "destroy"]);