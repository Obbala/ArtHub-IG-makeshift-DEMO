@extends(layouts.app)


@section(content)
<div class="container">
@foreach ($posts as $post)
<div class="row">
    <div class="col-6 offset-3 ">
        <a href="/profile/{{$post->user->id}}">
        <img src="/storage/{{$post->image}}" class="w-100">
        </a>
    </div>


    <div class="row pt-2 pb-4">

    </div>

    



    <div class="col-4">
        <div>
            <div class="d-flex align-items-center">
                <div class="pr-3">
                    <!--USER PROFILE PIC-->
                    <img src="/storage/{{ $post->user->profile->image }}" class="rounded-circle w-100" style="max-width:25px;" >
                </div>
                <div>
                    <div class="font-weight-bold">
                        <span class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">{{$post->user->username}}</a>
                            <a href="#" class="pl-3">| Follow</a>
                        </span>
                    </div>
                </div>
            </div>
            <p><span class="font-weight-bold">
                <a href="/profile/{{ $post->user->id }}">{{$post->user->username}}</a>
            </span>{{ $post->caption}}</p>
        </div>

    </div>
</div>
@endforeach
</div>
@endsection