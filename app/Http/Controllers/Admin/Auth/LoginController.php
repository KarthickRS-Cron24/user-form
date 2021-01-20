<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
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
            $users = Admin::get();
            //  dd($users);
            
            $credentials = $req->only('email', 'password');
            // dd(Auth::guard());
            $auth=Auth::guard('admin')->attempt($credentials);
            if($auth)
            {
                return redirect()->intended(route('admin.home')) ;
            }
       }
       else
       {
           return redirect()->back()->withErrors($validated)->withInput();
       }
        
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect()->route('admin.login');
    }
    
    protected function guard()
    {
        return Auth::guard('admin');
    }

}

