<?php

use App\Http\Controllers\CompoundController;
use App\Http\Controllers\CompoundPropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use App\Models\Compound;
use Illuminate\Support\Facades\Auth;
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

Route::middleware("auth")->group(function(){

    Route::get('/', [HomeController::class, "redirect"]);

    Route::controller(LanguageController::class)->group(function(){
        Route::get("lang/{lang}", "local")->name("local");
    });

    Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


        Route::controller(UserController::class)->group(function(){
            Route::get("home", "index")->name("user.index");
        });

        Route::controller(LocationController::class)->group(function(){
            Route::get("location/{location}/{category?}", "show")->name("locations.show");
        });

        Route::controller(CompoundController::class)->group(function(){
            Route::get('compounds/search', "search")->name("compounds.search");
        });

        Route::controller(PropertyController::class)->group(function(){
            Route::get('proterities', "index")->name("properties.index");
            Route::get('proterities/{properties}', "show")->name("properties.show");
            Route::get('compare/{property1?}/{type?}/{property2?}', "compare")->name("properties.compare");
            Route::get('properties/search/{compound}', "search")->name("properties.search");
        });



    });


});
