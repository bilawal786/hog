<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function update(Request $request, $id){
        $validator = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|max:100|unique:users,email,'.Auth::user()->id,
        ]);
        $data=User::where('id', Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);
        $notification = array(
            'messege' => 'Profile update successfully!',
            'type' => 'success'
        );
        return response()->json($notification);
    }
    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'old_password' => 'required|min:8',
            'new_password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8|required',
        ]);
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->old_password , $hashedPassword )) {

            if (!Hash::check($request->new_password , $hashedPassword)) {
                $users =User::find(Auth::user()->id);
                $users->password = bcrypt($request->new_password);
                User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));
                $notification = array(
                    'messege' => 'Password updated successfully',
                    'type' => 'success'
                );
                return response()->json($notification);
            }
            else{
                $notification = array(
                    'messege' => 'New password can not be the old password',
                    'type' => 'error'
                );
                return response()->json($notification);
            }
        }
        else{
            $notification = array(
                'messege' => "Old password doesn't matched",
                'type' => 'error'
            );
            return response()->json($notification);
        }
    }
}
