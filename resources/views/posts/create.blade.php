@extends('layouts.app')

@section('content')
<div class="contianer">
    <form action="/p" enctype="multipart/form-data" method="post">
    @csrf
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Post</h1>
            </div>
                <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                <div class="col-md-6">
                    <input id="caption" 
                    type="text" class="form-control @error('caption') 
                    is-invalid @enderror" 
                    name="caption" 
                    value="{{ old('caption') }}" 
                    required autocomplete="caption" autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row">
                 <label for="image" class="col-md-4 col-form-label">Post Image</label>
                 <input type="file" name="image" id="image" class="form-control-file" >


                 @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Add new Post</button>
                </div>
        </div>
    </div>
    </form>
</div>
@endsection
