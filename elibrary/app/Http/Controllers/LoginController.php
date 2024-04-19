<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function submit(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Check the user_type
            if ($user->user_type === 'Student') {
                // Redirect to student dashboard
                return redirect()->route('home.student');
            } elseif ($user->user_type === 'Staff') {
                // Redirect to staff dashboard or index page
                return redirect()->route('home.index');
            } else {
                // Handle other user types or scenarios
                return redirect()->route('login')->with('error', 'Invalid user type');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid username or password');
        }
    }


    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'password' => 'required|min:6',
        ]);

        // Create and save the new user
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_type = $request->usertype;
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect back with success message
        return back()->with('success', 'User created successfully.');
    }

    public function student()
    {
        return view('welcome');
    }
}
