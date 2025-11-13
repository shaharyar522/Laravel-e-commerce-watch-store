<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.admin_auth.Login_admin_page');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('admin')) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }
            Auth::logout();
            return back()->with('error', 'You are not authorized as admin.');
        }
        return back()->with('error', 'Invalid email or password.');
    }
    public function logout(Request $request)
    {
        Auth::logout();                     // Log out the user
        $request->session()->invalidate();  // Destroy session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }
}
