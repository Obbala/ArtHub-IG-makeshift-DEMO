@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" enctype="multypart/form-data" method="post">
        @csrf
    <div class="col-8 offset-2">
        <div class="row">
            <h1>Add New Post</h1>
        </div>
        <div class="row">
            <h1>Post Caption</h1>
        </div>
    <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">Caption</label>

                            <div class="col-md-6">
                                <input id="caption"
                                 type="text" 
                                 class="form-control @error('caption') is-invalid @enderror" 
                                 caption="caption" 
                                 value="{{ old('caption') }}" 
                                 required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    </div>
    <div class="row">
        <label for="image" class="col-md-4 clo-form-label">Post Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="row pt-4">
        <button class="btn btn-primary">Add New Post</button>

    </div>
    </form>
   
   
</div> 
@endsection
