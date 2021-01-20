<?php
namespace App\Http\Controllers\Admin\Auth;
use App\Http\Controllers\Controller;
use App\Models\UserDetails;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_details=UserDetails::all();
        return view('admin.home',compact('user_details'));
    }
}