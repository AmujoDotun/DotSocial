<?php

namespace DotSocial\Http\Controllers;

use DotSocial\User;

use Illuminate\Http\Request;
use Intervention\Image\facades\Image;

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

        if(request('image')){
             //image path where the image is saved
        $imgPath = request('image')->store('profile', 'public');

        //this is to help resize all the image to the same size using the image invention class
        $image = Image::make(public_path("storage/{$imgPath}"))->fit(1000, 1000);
        
        $image->save();
        }

        auth()->user()->profile->update(array_merge(
            $data,
            ['image' => $imgPath] //this will overide the image in the $data request
        ));

        return redirect("/profile/{$user->id}");
    }
}
