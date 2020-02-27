@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
         <img src="/img/slack-customer-rmit.jpg" width="100" height="100" class="rounded-circle">
    </div> 
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">

            <h1>{{$user -> username}}</h1>
            <a href="/p/create"> Add New Post</a>
            </div>
                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> post</div>
                    <div class="pr-5"><strong>250k</strong> follower</div>
                    <div class="pr-5"><strong>150</strong> following</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user ->profile->title}}</div>
                <div>{{$user ->profile-> description}}</div>
                <div><a href="#">{{$user ->profile-> url}}</a></div>
            </div>
        </div>
</div>
<div class="row pt-5">

    @foreach($user->posts as $post)
    <div class="col-4 pb-4 ">
        <img src="/storage/{{ $post-> image}}" width="250" height="250" class="w-100 rounded-squre">
    </div>
    @endforeach
    
    </div>
</div>
@endsection
