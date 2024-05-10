<?php

use App\Http\Controllers\CompoundController;
use App\Http\Controllers\HomeController;
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



    Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');


        Route::controller(UserController::class)->group(function(){
            Route::get("home", "index")->name("user.index");
        });

        Route::controller(CompoundController::class)->group(function(){
            Route::get("compound/{compound}", "show")->name("compound.show");

        });

        Route::controller(PropertyController::class)->group(function(){
            Route::get('proterities', "index")->name("properties.index");
            Route::get('proterities/{properties}', "show")->name("properties.show");
        });



    });


});
