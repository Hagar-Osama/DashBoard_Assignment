<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
      //  dd($users);
        foreach($users as $user) {
            dd($user->profile);
        }
    }
}
