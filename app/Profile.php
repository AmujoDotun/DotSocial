<?php

namespace DotSocial;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded =[];

    public function profileImage(){
        $imagePath = ($this->image) ? $this->image : '/profile\wkqSdCJVuZK7svu1p4xhA74xTXh8KMmTVZZG0tKx.jpeg';
        return '/storage/' . $imagePath;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
