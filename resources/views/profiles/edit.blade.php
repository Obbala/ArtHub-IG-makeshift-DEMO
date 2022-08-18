@extends('layouts.app')

@section('content')
<div class="container">
<form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
    <div class="col-8 offset-2">

        <div class="row">
            <h1>Edit Profile</h1>
        
        </div>

    <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                title="title" 
                                value="{{ old('title') ?? $user->profile->title}}" 
                                required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    </div>
<!--------//////////////////////////////////////////////////////////////////////////////////////////////////////////---------->
    <div class="col-8 offset-2">
        <div class="row">
            <h1>Description</h1>
        
        </div>
    <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <input id="description" 
                                type="text" 
                                class="form-control @error('description') is-invalid @enderror" 
                                description="description" 
                                value="{{ old('description')?? $user->profile->description }}" 
                                required autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    </div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="col-8 offset-2">
        <div class="row">
            <h1>Edit Url</h1>
        
        </div>
    <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('url') }}</label>

                            <div class="col-md-6">
                                <input id="url" 
                                type="text" 
                                class="form-control @error('url') is-invalid @enderror" 
                                url="url" value="{{ old('url') ?? $user->profile->url }}" 
                                required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
    </div>
    <!--/////////////////////////////////////////////////////////////////////-->
    <div class="row">
        <label for="image" class="col-md-4 clo-form-label">Profile Image</label>
        <input type="file" class="form-control-file" id="image" name="image">
        @if ($errors->has('image'))
        <strong>{{ $errors->first('image') }} </strong>
        @endif
    </div>
    <div class="row pt-4">
        <button class="btn btn-primary">Save</button>

    </div>
    </form>
  
</div> 
@endsection
