<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        // //     //lazy loading
            $users = User::get();
            //  dd($users);
        return view('users.index', ['users' => $users]);


              //     $users = User::all();
        //   // dd($users);
        //     foreach($users as $user) {
        //         dd($user->profile);
        //     }


        // //           //eagerloading
        // $users = User::with('profile')->get();
        // dd($users->profile);


    }
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
          //validations
          $request->validate([
            'name' => 'required|string|max:255|min:3|unique:users,name',
            'email' =>'required|string|max:255|unique:users,email',
            'password' =>'required|min:8|',

        ]);
        User::create($request->except(['_token']));
        return redirect()->route('users.index')->with('success', 'User Has Been Created Successfully');
    }
}
