<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    //
    public function createregister(Request $request){
        $request->validate([
            'name' => 'required',
            // 'email' => 'required',
            'password' => 'required',
            'email' => ['required', 'string','email','max:255','unique:users'],
            // 'password' => ['required|confirmed|min:6'],

        ]);

        $adduser = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);
       if ($adduser) {
        return redirect()->route('login')->with('success','you have registered successfully');
       
       }else{
        return back()->with('fail','you have registered successfully');
       }

    }
    public function checklogin(Request $request){
        $request->validate([
            // 'email' => 'required',
            'password' => 'required',
            'email' => ['required'],
            // 'password' => ['required|confirmed|min:6'],
        ],[
            'email.required' => 'email is required',
            'password.required' => 'password is required',
        ]);
        $creds = $request->only('email','password');
        if (auth()->attempt($creds)){
            return redirect()->route('home');
            
        }else{
            return back()->with('fail','incorrect credentials');
        }
    }
}