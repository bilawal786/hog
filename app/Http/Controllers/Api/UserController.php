<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //REGISTER METHOD - POST
    public function register(Request $request){
        //validation
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:Users',
            'password'=>'required|confirmed',
           
        ]);
        //create data
            $author = new User();
  
            $author->name = $request->name;
            $author->email = $request->email;
            $author->password =  bcrypt($request->password);
  
        //dave data and send response
            $author->save();
  
            return response()->json([
                "status" => 1,
                "message" => "Auth Created Successfully"
            ]);
  
    }
   //LOGIN METHOD - POST
   public function login(Request $request){
        //validation
        $login_data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        //token
        if(!auth()->attempt($login_data)){
            return response()->json([
                'status' => false,
                'message' => 'not login successfully',
                'auth'=> auth()
            ]);
        }
        $token = auth()->user()->createToken("auth_token")->accessToken;
        return response()->json([
            'status' => true,
            'message' => 'Author login successfully',
            'access_token' => $token
        ]);
        //send respons
    }
   //PROFILE METHOD - GET
   public function profile(){
        $user_data = auth()->user();
  
        return response()->json([
            'status'=>true,
            'message'=>'user data',
            'data'=>$user_data
        ]);
    }
   //LOGOUT METHOD - post
   public function logout(Request $request){
        //get token value
        $token = $request->user()->token();
        //revoke token
        $token->revoke();
        return response()->json([
            'status'=>true,
            'message'=>'successfully logout'
        ]);
    }
}
