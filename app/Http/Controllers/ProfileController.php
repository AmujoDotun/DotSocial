<?php

namespace DotSocial\Http\Controllers;

use DotSocial\User;

use Illuminate\Http\Request;
use Intervention\Image\facades\Image;
use Illuminate\Support\Facades\Cache;

class ProfileController extends Controller
{
    public function index(User $user){

        $postCount =  Cache::remember('count.posts.'. $user->id, now()->addSeconds(30), function() use ($user){
            return $user->posts->count();
        });


        $followersCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function() use($user){
            return $user->profile->followers->count();
        });

        $followingCount = Cache::remember('count.following.'. $user->id, now()->addSeconds(30), function() use($user){
            return $user->following->count();
        });

        $follows =(auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
        

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

        $imageArray = ['image' => $imgPath];

        }

        auth()->user()->profile->update(array_merge(
            
            $data,
            //IF A new user is to update their profile but are not yet 
            //ready to change the default profile image this array handle it
            $imageArray ?? [], //this will overide the image in the $data request
        ));

        return redirect("/profile/{$user->id}");
    }
}
