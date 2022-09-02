<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    
      public function perform()
    {
        Session::flush();        
        Auth::logout();
        return redirect('login');
    }

   public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'role' => 'required|string',            
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
              'role' => $request->role,
                'status' =>'0',
        ]);

        event(new Registered($user));
        Auth::login($user);      

        // return redirect(RouteServiceProvider::HOME);
         return redirect()->back()->with('success','New user Registered successful');
    }

    public function register()
    {
      return view('auth.register');
    }

    public function login()
    {
      return view('auth.login');
    }
}
