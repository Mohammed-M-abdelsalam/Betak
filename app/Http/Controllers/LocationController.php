<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index(){
        $locations = Location::all();
        if(session()->get("lang") == "ar"){
            $description = "description_ar";
        }else{
            $description = "description_en";
        }
        return view("admin.locations.index", compact("locations", "description"));
    }

    public function show($id, $category=""){
            $location = Location::findorfail($id);
            $categories = Category::all();
            if($category == ""){
                $properties = [];
                foreach($location->property as $property){
                    $properties[] =  $property;
                }
            }else{
                $properties = Property::where("category_id", $category)->where("location_id", $location->id)->get();
            }
            if(Auth::user()->role == 1){
                return abort(404);
            }else{
                return view("user.locations.show", compact("location", "categories", "properties"));
            }

    }

    public function create(){
        return view("admin.locations.create");
    }
    public function store(Request $request){
        Validator::make($request->all() ,[
            "name" => "required|string|max:100",
            "description_ar" => "required|string",
            "description_en" => "required|string",
        ])->validate();

        Location::create([
            "name" => $request->name,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
        ]);
        return redirect(Route("admin.locations.index"));
    }

    public function destroy($id){
        $location = Location::findorfail($id);
        $location->delete();
        return redirect(Route("admin.locations.index"));
    }

    public function edit($id){
        $location = Location::findorfail($id);
        return view("admin.locations.edit", compact("location"));
    }
    public function update($id, Request $request){
        $location = Location::findorfail($id);
        Validator::make($request->all(),
        [
            "name" => "required|string|max:100",
            "description_en" => "required|string",
            "description_ar" => "required|string",
        ])->validate();
        $location->update([
            "name" => $request->name,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
        ]);
        return redirect(Route("admin.locations.index"));
    }
}
