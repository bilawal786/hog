<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePassword extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request)
    {
         $this->validate($request, [
        'oldPassword' => 'required',
        'newPassword' => 'required_with:ConformPassword|same:ConformPassword',
        'conformPassword' => 'required',
        ]);
 
 
       $hashedPassword = Auth::user()->password;

       
 
       if (Hash::check($request->oldPassword , $hashedPassword )) {

       
 
         if (!Hash::check($request->newPassword , $hashedPassword)) {
 
              $users =User::find(Auth::user()->id);
              $users->password = bcrypt($request->newPassword);
              User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
 
              session()->flash('message','password updated successfully');
              return redirect()->back();
            }
 
            else{
                  session()->flash('message','new password can not be the old password!');
                  return redirect()->back();
                }
 
           }
 
          else{
               session()->flash('message','old password doesnt matched ');
               return redirect()->back();
             }
 
       

    }

 
}
