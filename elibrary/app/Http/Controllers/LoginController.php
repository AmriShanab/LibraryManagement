<?php

namespace App\Http\Controllers;

use App\Models\books;
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
            $user = Auth::user();
            if ($user->user_type === 'Student') {
                return redirect()->route('home.student');
            } elseif ($user->user_type === 'Staff') {
                return redirect()->route('home.index');
            } else {
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
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_type = $request->usertype;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'User created successfully.');
    }

    public function student()
    {
        return view('welcome');
    }

    public function guest()
    {
        $books = books::paginate(10);
        return view('guest', compact('books'));
    }
}
