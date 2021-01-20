<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
   

    public function index()
    {
        $id = Auth::id();
        $info=UserInfo::where('user_id',$id)->get();
        
        return view('home',compact("info"));
    }
}
