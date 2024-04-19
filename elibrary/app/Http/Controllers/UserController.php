<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index() 
    {
        $users=User::get();
        return view('users',['users'=>$users]);
    }

    public  function create()
    {
        return view('create_user');
    }

    // public function store(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'name' => 'required',
    //         'username' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         //'usertype'=>'required', // Make sure the field name matches
    //     ]);
    
    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->username = $request->username;
    //     $user->email = $request->email;
    //     // Hash the password before saving
    //     $user->password = Hash::make($request->password);
    //     //$user->user_type = $request->usertype; // Corrected to match the field name
    //    // dd($user);
    //     $user->save();
    //     return back()->withSuccess('User Added Successfully');
    // }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    

    public function show($id)
    {
        $user=User::where('id',$id)->first();
        return view('show_user',['user'=>$user]);
    }

    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        return view('edit_user',['user'=>$user]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8',
            // 'usertype'=>'required',
        ]);
    
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        // Hash the password before updating
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->withSuccess('User Updated Successfully');
    }

    public function destroy($id)
    {
        $user=User::where('id',$id)->first();
        $user->delete();
        return back()->withSuccess('User Delete Succeful');


    }
}
