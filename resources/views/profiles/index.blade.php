@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5" >
            <img src="{{$user->profile->image}}" class="rounded-circle w-100">
       </div>
   </div>

   <div class="row">
       <div class="col-9 pt-5">
           <div class="d-flex justify-content-between align-items-baseline">
               <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ Auth::$user()->username }}</div>

                        <follow-button user-id="{{$user->id}}" follows={{$follows}}></follow-button>

               </div>
           
           
           @can ('update',$user->profile)
           <a href="/p/create">Make New Post</a> 
           @endcan
           
           </div>


           @can ('update',$user->profile)
           <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
           @endcan
            

           <div class="d-flex justify-content-between align-items-baseline">
           <div class="pr-5"> <strong>{{$user->posts->count()}} </strong>posts </div>
           <div class="pr-5"> <strong>{{$user->profile->followers->count()}} </strong>Followers </div>
           <div class="pr-5"> <strong>{{$user->following->count()}} </strong>Following </div>
           </div>

           <!--THIS IS WHERE YOU WANT TO LOOK AT BIG MAN-->
           <div clss="pt-4 font-weight-bold">{{$user->profile->title}}</div>
           <div>{{$user->profile->description}}</div>
           <div><a href="#">{{$user->profile->url}}</a></div>
        
       </div>
       <div class="row pt-5">
           @foreach($user->posts as $post)
           <div class="col-4 pb-4">
               <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" alt="" class="w-100" >

               </a>

           </div>

           @endforeach
           

       </div>
   </div>
</div> 
@endsection
