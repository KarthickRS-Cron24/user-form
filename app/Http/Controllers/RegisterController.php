<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use  App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
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
            // dd($req);
            
            echo "<script>alert('Thankyou for registration.');</script>";
            return redirect('login');

        }
        else
        {
            return redirect()->back();
            
        }
    }
}
