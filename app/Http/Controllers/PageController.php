<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){

        $announcements = Announcement::take(6)->get()->sortByDesc('created_at');
        // dd($announcements);

        return view('welcome',compact('announcements'));
    }
}
