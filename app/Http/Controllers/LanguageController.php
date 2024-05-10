<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function local($lang){
        if($lang == "en"){
            session()->put("lang", "en");
        }else{
            session()->put("lang", "ar");
        }

        return redirect()->back();
    }
}
