<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class LoginController extends Controller {
   
 public function login(Request $request) {
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // Fetch user by email
    $user = DB::table('users')->where('email', $request->email)->first();

    // Compare plain text password
    if ($user && $request->password === $user->password) {
       session()->put('user', [
    'username' => $user->name,
    'email' => $user->email,
    'user_id' => $user->id
]);
    return redirect()->route('welcome')->with('success', 'Logged in successfully!');
    } else {
        return redirect()->back()->with('error', 'Invalid email or password.');
    }
}



   function SignUp(Request $req) {
    $req->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'post' => 'required|string|max:255',
        'password' => 'required|string|min:5|confirmed',
    ]);
    $user = new User();
    $user->name = $req->input('name');
    $user->email = $req->input('email');
    $user->post = $req->input('post'); // Ensure 'post' column exists in your users table
    $user->password = $req->input('password');
    
   session()->put('user', [
    'username' => $user->name,
    'email' => $user->email,
    'user_id' => $user->id
]);

    if($user->save()){
    return redirect()->route('login')->with('success', 'Account created successfully.');
    } else {
    return redirect()->back()->with('error', 'Failed to create account.');
   }
}

 public function logout()
{
    Auth::logout(); // Logs out the user
   // Optional: Invalidate the session and regenerate CSRF token
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/')->with('success', 'Logged out successfully!');
}

// -------------------------------------------------------------------------------------
 
//  public function 




}

