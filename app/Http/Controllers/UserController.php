<?php

namespace App\Http\Controllers;

use App\Models\Compound;
use App\Models\Property;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function index(){
        $compounds = Compound::all();
        $properties_num = [];
        foreach($compounds as $c){
            $properties_num[] = Property::where("compound_id", $c->id)->get()->count();
        }
        return view("user.index", compact("compounds"))->with("properties_num", $properties_num);
   }
}
