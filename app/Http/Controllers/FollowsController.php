<?php

namespace DotSocial\Http\Controllers;

use Illuminate\Http\Request;
use DotSocial\User;

class FollowsController extends Controller
{
    public function store(User $user){
        return auth()->user()->following()->toggle($user->profile);
        
    }
}
