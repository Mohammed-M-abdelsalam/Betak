<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AgentController extends Controller
{
    public function index(){
        $agents = Agent::all();
        return view("admin.agents.index", compact("agents"));
    }

    public function show(){
        return abort(404);
    }

    public function create(){
        return view("admin.agents.create");
    }
    public function store(Request $request){
        $request->validate([
            "name" => "required|string",
            "email" => "required|email|unique:users,email",
            "phone" => "required|string|max:12",
        ]);
        Agent::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);
        return redirect(Route("admin.agents.index"));
    }

    public function destroy($id){
        $agent = Agent::findorfail($id);
        $agent->delete();
        return redirect(Route("admin.agents.index"));
    }

    public function edit($id){
        $agent = Agent::findorfail($id);
        return view("admin.agents.edit", compact("agent"));
    }
    public function update($id, Request $request){
        $agent = Agent::findorfail($id);
        $request->validate([
            "name" => "required|string",
            "email" => "required|string|email",
            "phone" => "required|string|max:12",
        ]);
        $agent->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
        ]);
        return redirect(Route("admin.agents.index"));
    }

}
