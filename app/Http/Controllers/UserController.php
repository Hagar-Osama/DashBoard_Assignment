<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
