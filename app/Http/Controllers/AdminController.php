<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $properties = Property::all();
        return view("admin.index", compact("properties"));
    }
}
