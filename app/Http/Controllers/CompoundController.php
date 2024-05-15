<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Compound;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class CompoundController extends Controller
{
    public function index(){
        $compounds = Compound::groupBy( "location_id", "id", "name", "img")->get();
        return view("admin.compounds.index", compact("compounds"));
    }

    public function show($id, $category=""){
        $compound = Compound::findorfail($id);
        $categories = Category::all();
        if($category == ""){
            $properties = [];
            foreach($compound->property as $property){
                $properties[] =  $property;
            }
        }else{
            $properties = Property::where("category_id", $category)->where("compound_id", $compound->id)->get();
        }

        if(Auth::user()->role == 1){
            return view("admin.compounds.show", compact("compound"));
        }else{
            return view("user.compounds.show", compact("compound", "categories", "properties"));
        }
    }

    public function search(Request $request){
        $count = 0;
        $search_text = $request->input("search_text");
        $bedroom = $request->input("bedroom");
        $category = $request->input("category");
        $compounds = Compound::query();

        //store request data in the session
        session()->put("data", $request->all());

        if($search_text){
            $compounds->where(function($query) use ($search_text){
                $query->whereHas("location", function($query) use($search_text){
                    $query->where("name", "LIKE", "%" . $search_text . "%");
                })->orWhere(function($query) use($search_text){
                    $query->where("name", "LIKE", "%" . $search_text . "%");
                });
            });
        }


        if(!empty($bedroom) and !empty($category)):
            $compounds->whereHas("property", function($query) use($bedroom, $category){
                $query->where("bedrooms", $bedroom)->where("category_id", $category);
            });
        elseif(!empty($bedroom)):
            $compounds->whereHas("property", function($query) use($bedroom){
                $query->where("bedrooms", $bedroom);
            });
        elseif(!empty($category)):
            $compounds->whereHas("property", function($query) use($category){
                $query->where("category_id", $category);
            });
        endif;


        $results = $compounds->get();
        $count = $results->count();
        if(! $results->isEmpty()){
            return view("user.compounds.search", compact("results", "count"));
        }else{
            $count = Compound::count();
            $results = Compound::all();
            return view("user.compounds.search", compact("results", "count"));
        }
}


    public function create(){
        $locations = Location::all();
        return view("admin.compounds.create", compact("locations"));
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string|max:100",
            "img" => "required|image|mimes:png,jpg,jpeg",
            "location" => "required|exists:locations,id",
        ]);
        $img = Storage::putFile("compounds", $request->img);
        Compound::create([
            "name" => $request->name,
            "img" => $img,
            "location_id" => $request->location,
        ]);
        return redirect(Route("admin.compounds.index"));
    }

    public function destroy($id){
        $compound = Compound::findorfail($id);
        if(Storage::has($compound->img)){
            Storage::delete($compound->img);
        }
        $compound->delete();
        return redirect(Route("admin.compounds.index"));
    }


    public function edit($id){
        $locations = Location::all();
        $compound = Compound::findorfail($id);
        return view("admin.compounds.edit", compact("locations"))->with("compound", $compound);
    }

    public function update($id, Request $request){
        $request->validate([
            "name" => "required|string",
            "img" => "image|mimes:jpg,png,jpeg",
            "location" => "required|exists:locations,id",
        ]);
        $compound = Compound::findorfail($id);
        if($request->has("img")){
            if(Storage::has($compound->img)){
                Storage::delete($compound->img);
            }
            $img = Storage::putFile("compounds", $request->img);
        }else{
            $img = $compound->img;
        }
        $compound->update([
            "name" => $request->name,
            "img" => $img,
            "location_id" => $request->location,
        ]);
        return redirect(Route("admin.compounds.index"));
    }


}
