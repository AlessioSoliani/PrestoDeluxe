<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        //faccio passare solo gli annunci dove is_accepted ha come valo re true dove ne mostra massimo 6 in ordine di creazione (mostra ultimo creato e accettato come primo annuncio)
        $announcements = Announcement::where('is_accepted',true)->take(6)->get()->sortByDesc('created_at');
        // dd($announcements);

        return view('welcome',compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow', compact('category'));
    }

    public function searchAnnouncements(Request $request){
        $announcements = Announcement::search($request->searched)->where('is_accepted',true)->paginate(10);
        return view ('announcements.index', compact('announcements'));
    }
}
