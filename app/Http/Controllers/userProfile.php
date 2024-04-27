<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userProfile extends Controller
{
    public function UserProfile(User $user){
        $user=Auth::user();
        $announcements = $user->announcements()->get();
        return view('Profilo.user_profile',compact('user', 'announcements'));

    }
}
