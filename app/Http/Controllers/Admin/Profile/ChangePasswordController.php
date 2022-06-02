<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
              $success = session()->flash('message','password updated successfully');
              return response()->json($success);
            }
            else{
                  $notSame = session()->flash('message','new password can not be the old password!');
                  return response()->json($notSame);
                }
           }
          else{
               $notMatch = session()->flash('message','old password doesnt matched ');
               return response()->json($notMatch);
             }
    }
}
