<?php

namespace DotSocial\Http\Controllers;

use DotSocial\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($user){
        $user = User::findorFail($user);
        return view('profiles.index',[
            'user' => $user,
        ]);
    }
}
