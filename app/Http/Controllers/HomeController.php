<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if(Auth::id()):
            if(Auth::user()->role == 1):
                return redirect(Route("admin.index"));
            else:
                return redirect(Route("user.index"));
            endif;
        endif;

    }

}
