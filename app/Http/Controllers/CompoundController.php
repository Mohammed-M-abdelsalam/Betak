<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Compound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class CompoundController extends Controller
{
    public function index(){
        $compounds = Compound::groupBy( "location_id", "id", "name", "img")->get();
        return view("compounds.index", compact("compounds"));
    }

    public function show($id){
        $compound = Compound::findorfail($id);
        return view("compounds.show", compact("compound"));
    }

    public function create(){
        $locations = Location::all();
        return view("compounds.create", compact("locations"));
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
        return redirect(Route("compounds.index"));
    }

    public function destroy($id){
        $compound = Compound::findorfail($id);
        if(Storage::has($compound->img)){
            Storage::delete($compound->img);
        }
        $compound->delete();
        return redirect(Route("compounds.index"));
    }


    public function edit($id){
        $locations = Location::all();
        $compound = Compound::findorfail($id);
        return view("compounds.edit", compact("locations"))->with("compound", $compound);
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
        return redirect(Route("compounds.index"));
    }


}
