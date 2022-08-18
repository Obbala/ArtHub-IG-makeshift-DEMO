<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use App\User;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
//use App\Models\User;



//initially FoloowsController during creation
class FollowsController extends Controller
{

    public function __construct(){
        $this ->middleware('auth');

    }

    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile); 
    }
}
