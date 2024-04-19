<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'userType' => 'required',
            'registrationdate' => 'required|date',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($validatedData['password']);

        // Create a new user instance
        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $hashedPassword;
        $user->user_type = $validatedData['userType'];
        $user->registration_date = $validatedData['registrationdate'];

        // Save the user record
        $user->save();

        // Redirect the user after successful registration
        return redirect()->route('login')->with('success', 'User registered successfully. You can now log in.');
    }
}
