<?php

namespace DotSocial\Http\Controllers;

use DotSocial\User;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user){

        return view('profiles.index', compact('user'));

        //this is just another way to get the users data, but the above is simple way of doing it
        // $user = User::findorFail($user);
        // return view('profiles.index',[
        //     'user' => $user,
        // ]);
    }

    public function edit(User $user){

        //to authorize only a user to edit their profile credentials
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        //to authorize only a user to update their profile credentials
        $this->authorize('update', $user->profile);
        
        $data = request()->validate([
            'title' =>'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
