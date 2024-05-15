<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Compound;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function index(){
       $locations = Location::all();
       $categories = Category::all();
       $bedrooms = Property::orderBy("bedrooms")->distinct("bedrooms")->pluck("bedrooms");
        foreach($locations as $l){
            $properties_num[] = Property::where("location_id", $l->id)->get()->count();
        }
        return view("user.index", compact("locations", "categories", "bedrooms"))->with("properties_num", $properties_num);
   }
}
