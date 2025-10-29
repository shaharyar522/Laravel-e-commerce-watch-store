<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserAuthController extends Controller
{
    // Show registration page
    public function showRegistration()
    {
        return view('User_Auth.Registration_user_page');
    }

    public function register(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $user->assignRole('user');
        Auth::login($user);

        // Redirect to login page with success message
        return redirect()->route('user.login')->with('success', 'Congratulations! Your account has been created successfully.');
    }


    // Show login page
    public function showLogin()
    {
        return view('User_Auth.Login_user_page');
    }

    public function  login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
}
