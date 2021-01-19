<?php

namespace App\Http\Controllers;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    public function __construct()
    {
        $usid=Auth::id();
        $info = UserInfo::where('user_id',$usid);
        
    }
    public function addCheck(Request $request)
    {
        $user_id=Auth::id();
        // echo $user_id.$request->date;
        UserInfo::create([
            'user_id' => $user_id, 
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date
        ]);
        return redirect()->back();
    }
    public function updateCheck(Request $request,$id)
    {
        echo $id.$request->title1;
        UserInfo::where('id',$id)
                    ->update(
                        [ 'title' => $request->title1,
                            'description' => $request -> description1,
                            'date' => $request -> date1
                        ]);
        return redirect()->back();
    }
    public function deleteCheck(Request $request)
    {
        UserInfo::where('id',$request->id)
                    ->delete();
        return redirect()->back();
    }
}
