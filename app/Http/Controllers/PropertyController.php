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
            return view("admin.properties.index", compact("properties"));
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
            return view("admin.properties.show", compact("property", "description"));
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

    function compare($property1="", $type="", $property2=""){
        if($type == "compound"){
            $properties = Property::all()->groupBy('compound_id', 'location_id');
        }elseif($type == "location"){
            $properties = Property::all()->groupBy('location_id', 'compound_id');
        }

        $first = null;
        $secound = null;
        if(!empty($property1)){
            $first = Property::findorfail($property1);
        }
        if(!empty($property2)){
            $secound = Property::findorfail($property2);
        }
        return view("user.properties.compare", compact("properties", "first", "secound"));
    }

public function search($id){
    $count = 0;
    $compound = Compound::findorfail($id);
    $data = session()->get("data");
    $search_text = $data["search_text"];
    $bedroom = $data["bedroom"];
    $category = $data["category"];
    $properties = Property::query();

    if($search_text){
        $properties->where(function($query) use ($search_text){
            $query->whereHas("location", function($query) use($search_text){
                $query->where("name", "LIKE", "%" . $search_text . "%");
            })->orWhereHas("compound", function($query) use($search_text){
                $query->where("name", "LIKE", "%" . $search_text . "%");
            });
        });
    }

    // $properties->whereBetween("price", [100000, 300000000]);

    $properties->whereHas("compound", function($query) use($compound){
        $query->where("id", $compound->id);
    });


    if(!empty($bedroom) and !empty($category)):
        $properties->where("bedrooms", $bedroom)->where("category_id", $category);
    elseif(!empty($bedroom)):
        $properties->where("bedrooms", $bedroom);
    elseif(!empty($category)):
        $properties->where("category_id", $category);
    endif;


    $results = $properties->get();
    $count = $results->count();
    if($results->isNotEmpty()){
    return view("user.properties.search", compact("results", "count"));
    }else{
        $count = Property::count();
        $results = Property::all();
        return view("user.properties.search", compact("results", "count"));
    }
}

//     public function search(Request $request){
//         $count = 0;
//         $search_text = $request->search_text;
//         $bedroom = $request->bedroom;
//         $category = $request->category;
//         $properties = Property::query();

//         if($search_text){
//             $properties->where(function($query) use ($search_text){
//                 $query->whereHas("location", function($query) use($search_text){
//                     $query->where("name", "LIKE", "%" . $search_text . "%");
//                 })->orWhereHas("compound", function($query) use($search_text){
//                     $query->where("name", "LIKE", "%" . $search_text . "%");
//                 });
//             });
//         }
//         if($bedroom){
//             $properties->where("bedrooms", $bedroom);
//         }
//         if($category){
//             $properties->where("category_id", $category);
//         }
//         $results = $properties->get();
//         foreach($results as $i):
//             $count++ ;
//         endforeach;
//         if(! $results->isEmpty()){
//         return view("user.properties.search", compact("results", "count"));
//         }else{
//             $count = Property::count();
//             $results = Property::all();
//             return view("user.properties.search", compact("results", "count"));
//         }
// }
    public function create(){
        $categories = Category::all();
        $compounds = Compound::all();
        $agents = Agent::all();
        $locations = Location::all();
        return view("admin.properties.create", compact("categories", "agents", "locations", "compounds"));
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
        ]);
        $compound = Compound::findorfail($request->compound);
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
            "location_id" => $compound->location->id,
        ]);
        $id = Property::latest()->first()->id;
        return redirect(route("admin.images.create", $id));
    }

    public function destroy($id){
        $property = Property::findorfail($id);
        foreach ($property->image as $img){
            if(Storage::has($img->img)){
                Storage::delete($img->img); //delete images
            }
        }
        $property->delete(); //delete the property
        return redirect(route("admin.properties.index"));
    }

    public function edit($id){
        $categories = Category::all();
        $compounds = Compound::all();
        $agents = Agent::all();
        $locations = Location::all();
        $property = Property::findorfail($id);
        return view("admin.properties.edit", compact("property", "categories", "agents", "locations", "compounds"));
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
        ]);

        $compound = Compound::findorfail($request->compound);
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
            "location_id" => $compound->location->id,
        ]);
        return redirect(route("admin.properties.index"));
    }
}
