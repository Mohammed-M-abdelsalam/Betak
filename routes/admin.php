<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompoundController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\TopCompoundController;
use App\Models\Image;
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

Route::middleware("auth", "admin", "verified")->name("admin.")->group(function(){

    Route::get("index", [AdminController::class, "index"])->name("index");

    Route::controller(CategoryController::class)->group(function(){
        Route::resource('categories', CategoryController::class);
    });

    Route::controller(AgentController::class)->group(function(){
        Route::resource('agents', AgentController::class);
    });

    Route::controller(LocationController::class)->group(function(){
        Route::resource('locations', LocationController::class);
    });

    Route::controller(CompoundController::class)->group(function(){
        Route::resource('compounds', CompoundController::class);
    });


    Route::controller(PropertyController::class)->group(function(){
        Route::resource('properties', PropertyController::class);
    });

    Route::controller(ImageController::class)->group(function(){
        Route::get("images/{img}", "show")->name("images.show");

        Route::get("images/create/{img}", "create")->name("images.create");
        Route::post("images/store/{img}", "store")->name("images.store");

        Route::delete("images/{img}", "destroy")->name("images.destroy");
    });


});



