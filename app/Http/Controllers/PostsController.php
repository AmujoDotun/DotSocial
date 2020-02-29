<?php

namespace DotSocial\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\facades\Image;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            'caption'=> 'required',
            'image'=> ['required', 'image']
        ]);

        //image path where the iage is saved
        $imgPath = request('image')->store('uploads', 'public');

        //this is to help resize all the image to the same size using the image invention class
        $image = Image::make(public_path("storage/{$imgPath}"))->fit(1200, 1200);
        
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imgPath
        ]);

        return redirect('/profile/' . auth()->user()->id );

        dd(request()->all());
    }
}
