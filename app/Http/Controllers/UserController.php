<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()) );
    }
    public function update_avatar(Request $_request){
        //upload avatar
        if ($_request->hasFile('avatar')){
            $avatar = $_request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatar/' . $filename) );

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
             }
             return view('profile', array('user' => Auth::user()) );
    }
   
}
