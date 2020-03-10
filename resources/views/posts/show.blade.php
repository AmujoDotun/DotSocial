@extends('layouts.app')

@section('content')
<div class="contianer">
   <div class="row">
      <div class="col-8">
      <img src="/storage/{{ $post -> image}}" alt="" class="w-100">
      </div>
   </div>
</div>
@endsection
