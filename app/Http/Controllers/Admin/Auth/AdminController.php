<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Models\UserDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\ValidationRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function addUser(ValidationRequest $req)
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
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
            
        }
    }

    public function updateUser(Request $request,$id)
    {
       
            UserDetails::where('id',$id)
            ->update(
                [ 
                    'name' => $request->name1,
                    'email' => $request->email1,
                    'password' => Hash::make($request->password1),
                    'dob' => $request -> dob1,
                    'phone' => $request ->phone1,
                   
                ]);
            return redirect()->back();
       
        
    }
    public function deleteUser(Request $request,$id)
    {
        UserDetails::where('id',$id)
                    ->delete();
        return redirect()->back();
    }
}
