<?php

namespace App\Http\Controllers;


//use App\Models\postModel as PostModel;
use Illuminate\Http\Request;
use App\Models;
use App\Models\postModel as ModelsPostModel;
use App\Models\ProfileModel;
use Intervetion\Image\Facades\Image;
use App\User;
use App\postModel;




class PostsController extends Controller
{
   public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $users= auth() -> user() ->following()-> pluck('profiles.user_id');
//CHECK NEXT LINE BIG MAN
        $posts = ModelsPostModel::whereIn('user_id',$users)->orderBy('created_at', 'DESC')->get();

        return view('posts.index',compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data =request()-> validate([
            'caption' => 'required',
            'image' =>['required','image'],
        ]);

        $imagePath=request('image')->store('uploads','public');


        $image= Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        auth()->user()-> posts()->create([
            'caption'=> $data['caption'],
            'image' => $imagePath,

        ]);

        //dd(request()->all());


 
        return redirect('/profile/'.auth()->user()->id);  
         
    }

//CHECK THIS PART AGAIN 
    public function show(\App\Models\postModel $post){
        return view('posts.show', compact('post'));

    }

}
