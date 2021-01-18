<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\UserDetails;

class LoginrController extends Controller
{
    public function loginCheck(Request $req)
    {
       $validated=Validator::make($req->all(),
           [
               'email' => 'required|email',
               'password' => 'required|min:6'
           ]
       );
       if(!$validated -> fails())
       {
            $users = UserDetails::get();
            // dd($users);
            $credentials = $req->only('email', 'password');
            //  dd($credentials);
            $user = Auth::user();
            echo  "<br>user".$user;
            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
                echo "<br>heelo";
                $user = Auth::id();
                echo  "<br>user".$user;
                if(Auth::check())
                {
                    return redirect()->intended('home');
                }

            }
            
            
       }
       else
       {
           return redirect()->back()->withErrors($validated)->withInput();
       }
        
    }

}
