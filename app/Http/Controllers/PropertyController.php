<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Compound;
use App\Models\Image;
use App\Models\Location;
use App\Models\Property;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(){
        if(Auth::user()->role == 1){
            $properties = Property::all();
            return view("properties.index", compact("properties"));
        }else{
            $properties = Property::all();
            return view("user.properties.index", compact("properties"));
        }
    }

    public function show($id){
        if(Auth::user()->role == 1){
            $property = Property::findorfail($id);
            if(session()->get("lang") == "ar"){
                $description = "description_ar";
            }else{
                $description = "description_en";
           }
            return view("properties.show", compact("property", "description"));
        }else{
            $property = Property::findorfail($id);
            if(session()->get("lang") == "ar"){
                $description = "description_ar";
            }else{
                $description = "description_en";
           }
            return view("user.properties.show", compact("property", "description"));
        }
    }

    public function create(){
        $categories = Category::all();
        $compounds = Compound::all();
        $agents = Agent::all();
        $locations = Location::all();
        return view("properties.create", compact("categories", "agents", "locations", "compounds"));
    }

    public function store(Request $request){
        $request->validate([
            "size" => "required|numeric",
            "price" => "required|numeric|between:0, 99999999.99",
            "description_en" => "required|string",
            "description_ar" => "required|string",
            "bedrooms" => "required|numeric",
            "location_link" => "required|string",
            "category" => "required|exists:categories,id",
            "compound" => "required|exists:compounds,id",
            "agent" => "required|exists:agents,id",
            "location" => "required|exists:locations,id",
        ]);
        Property::create([
            "size" => $request->size,
            "price" => $request->price,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "bedrooms" => $request->bedrooms,
            "location_link" => $request->location_link,
            "category_id" => $request->category,
            "compound_id" => $request->compound,
            "agent_id" => $request->agent,
            "location_id" => $request->location,
        ]);
        $id = Property::latest()->first()->id;
        return redirect(route("images.create", $id));
    }

    public function destroy($id){
        $property = Property::findorfail($id);
        foreach ($property->image as $img){
            if(Storage::has($img->img)){
                Storage::delete($img->img); //delete images
            }
        }
        $property->delete(); //delete the property
        return redirect(route("properties.index"));
    }

    public function edit($id){
        $categories = Category::all();
        $compounds = Compound::all();
        $agents = Agent::all();
        $locations = Location::all();
        $property = Property::findorfail($id);
        return view("properties.edit", compact("property", "categories", "agents", "locations", "compounds"));
    }

    public function update($id, Request $request){
        $property = Property::findorfail($id);
        $request->validate([
            "size" => "required|numeric",
            "price" => "required|numeric|between:0, 99999999.99",
            "description_en" => "required|string",
            "description_ar" => "required|string",
            "bedrooms" => "required|numeric",
            "location_link" => "required|string",
            "category" => "required|exists:categories,id",
            "compound" => "required|exists:compounds,id",
            "agent" => "required|exists:agents,id",
            "location" => "required|exists:locations,id",
        ]);

        $property->update([
            "size" => $request->size,
            "price" => $request->price,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
            "bedrooms" => $request->bedrooms,
            "location_link" => $request->location_link,
            "category_id" => $request->category,
            "compound_id" => $request->compound,
            "agent_id" => $request->agent,
            "location_id" => $request->location,
        ]);
        return redirect(route("properties.index"));
    }
}
