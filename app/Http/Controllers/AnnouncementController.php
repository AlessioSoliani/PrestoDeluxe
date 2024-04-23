<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class AnnouncementController extends Controller
{
    public $images = []; 
    public $image;
    public function createAnnouncement(){
        // $user = Auth::id();

        return view('announcements.create');//,compact('user')
    }
    


//showAnn. prende l'annuncio con la dependency injection
    public function showAnnouncement (Announcement $announcement){       
        

        // e rimanda alla vista, con una compact passiamo il dato dell'annuncio
        return view('announcements.show',compact('announcement'));


    }


    public function indexAnnouncement(){        
        // $announcements = Announcement::where('user_id',$user)->get();
        //dentro la variabile il modello announcement e dove is-accepted sara con valore true lo salviamo e motriamo nella vista
        //dedicata a tutti gli annunci
        $announcements = Announcement::where('is_accepted',true )->orderBy('created_at','desc')->paginate(7);
        return view('announcements.index',compact('announcements'));

    }


}
