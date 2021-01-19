<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use  App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function registerCheck(ValidationRequest $req)
    {
        
        if($validated =$req->validated())
        {
            $user = new UserDetails();
            
            $user -> name = $req -> name;
            $user -> email = $req -> email;
            $user -> password = Hash::make($req->password);
            $user -> dob = $req -> dob;
            $user -> phone = $req -> phone;
            $user -> remember_token = $req -> _token;
            $user -> save();  
            $credentials = $req->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $req->session()->regenerate();
                if(Auth::check())
                {
                    return redirect()->intended('home');
                }
            }
        }
        else
        {
            return redirect()->back();
            
        }
    }
}
