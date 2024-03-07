<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

Route::get("/listings/create", [ListingController::class, "create"])->middleware("auth");

Route::get("/listings/{listing}/edit", [ListingController::class, "edit"])->middleware("auth");

Route::get("/listings/{id}/{title}", [ListingController::class, "show"]);

Route::get("/register", [UserController::class, "index"])->middleware("guest");

Route::get("/login", [UserController::class, "login"])->name("login");

Route::get("/manage", [ListingController::class, "manage"])->middleware("auth");

Route::post("/listings", [ListingController::class, "store"]);

Route::post("/users/register", [UserController::class, "store"]);

Route::post("/users/auth", [UserController::class, "authenticate"]);

Route::post("/logout", [UserController::class, "logout"]);

Route::put("/listings/{listing}", [ListingController::class, "update"]);

Route::delete("/listings/{listing}", [ListingController::class, "destroy"]);