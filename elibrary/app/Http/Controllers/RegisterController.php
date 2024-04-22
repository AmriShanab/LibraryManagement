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
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'userType' => 'required',
            'registrationdate' => 'required|date',
        ]);


        $hashedPassword = Hash::make($validatedData['password']);


        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->email = $validatedData['email'];
        $user->password = $hashedPassword;
        $user->user_type = $validatedData['userType'];
        $user->registration_date = $validatedData['registrationdate'];


        $user->save();


        return redirect()->route('login')->with('success', 'User registered successfully. You can now log in.');
    }
}
