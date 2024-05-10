<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show(){
        return abort(404);
    }

    public function create($id){
        $property = Property::findorfail($id);
        return view("images.create", compact("property"));
    }

    public function store($id, Request $request){
        $request->validate([
            "img" => "required|image|mimes:jpg,png,jpeg"
        ]);
        $img = Storage::putFile("properties", $request->img);
        Image::create([
            "img" => $img,
            "property_id" => $id,
        ]);
        return redirect(route("properties.index"));
    }


    public function destroy($id){
        $img = Image::findorfail($id);
        if(Storage::has($img->img)){
            Storage::delete($img->img);
        }
        $img->delete();

        return redirect(route("properties.show", $img->property->id));
    }
}
