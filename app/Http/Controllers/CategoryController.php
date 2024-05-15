<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

use function Ramsey\Uuid\v1;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view("admin.categories.index")->with("categories", $categories);
    }

    public function show(){
        return abort(404);
    }

    public function create(){
        return view("admin.categories.create");
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required|string",
        ]);
        Category::create([
            "name" => $request->name,
        ]);
        return redirect(Route("admin.categories.index"));
    }

    public function destroy($id){
        $category = Category::findorfail($id);
        $category->delete();
        return redirect(Route("admin.categories.index"));
    }

    public function edit($id){
        $category = Category::findorfail($id);
        return view("admin.categories.edit")->with("category", $category);
    }

    public function update($id, Request $request){
        $category = Category::findorfail($id);
        $request->validate([
            "name" => "required|string",
        ]);
        $category->update([
            "name" => $request->name,
        ]);
        return redirect(Route("admin.categories.index"));
    }

}
