@extends('layouts.app')

@section('content')
<div class="contianer">
  @foreach($posts as $post)

    <div class="row">
      <div class="col-8 offset-2">
        <a href="/profile/{{$post->user->id}}">
        <img src="/storage/{{ $post -> image}}" alt="" class="w-100">
        </a>
      </div>
    </div>

    <div class="row pt-2 pb-4">
      <div class="col-8 offset-2">
      <div>
            
         <p>
            <span class="font-weight-bold">
            <!-- /profile/{{$post  }} is to make the name cliable and refirect to user profile page -->
               <a href="/profile/{{ $post->user->id }}">
                  <span class="text-dark">
                     {{ $post->user->username }}
                  </span>
               </a>
            </span>{{$post->caption }}
         </p>
      </div>
      </div>
   </div>

  @endforeach
</div>
@endsection
