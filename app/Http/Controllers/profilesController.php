<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class profilesController extends Controller
{
    public function index($user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id):false;
        
        $user=User::findOrFail($user);

        return view('profiles.index',compact('user','follows'));
          
    }  
    //ModelsUser to User at User $user
    public function edit(User $user){

        $this->authorize('update', $user->profile);

         return view('profiles.edit', compact('user'));

    }

    public function update(User $user){
        $this->authorize('update', $user->profile);

        $data=request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            'image'=>'',
        ]);

        
        if (request('image')){
            $imagePath=request('image')->store('profile','public');


            $image= Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            
            $imageArray = ['image'=>$imagePath];

            

        }
        
        auth()->user->profile->update(array_merge(
            $data,
            //['image' => $imagePath]
            $imageArray ?? []
        ));
 

        return redirect("/profile/{$user->id}");
    }
}
