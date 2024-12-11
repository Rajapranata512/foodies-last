<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RecipeController;



class AuthController extends Controller
{
    //
    public function register(){
        // if(Auth::check()){
        //     return redirect() -> route('foodies.home');
        // }
        return View("auth.register");

    }


    public function doRegister(Request $request){
        $request->validate([
            'name'=>'required|max:25',
            'email' => 'required|email|unique:users',
            'password' =>'required|min:6|confirmed'
        ]);


        $user = User::create([
            'name' =>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('foodies.home')->with('success', 'Registration successful!');
    }

    public function profile(){
        $users = User::all();
        return view('profile', ['users'=>$users]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('foodies.home'); // Redirect to home or login page
    }
    public function login(){
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }
}


