<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;


class AnnouncementController extends Controller
{
    public function createAnnouncement(){
        return view('announcements.create');
    }
//showAnn. prende l'annuncio con la dependency injection
    public function showAnnouncement (Announcement $announcement){
        // e rimanda alla vista, con una compact passiamo il dato dell'annuncio
        return view('announcements.show',compact('announcement'));
    }


    public function indexAnnouncement(){
        //dentro la variabile il modello announcement e dove is-accepted sara con valore true lo salviamo e motriamo nella vista
        //dedicata a tutti gli annunci
        $announcements = Announcement::where('is_accepted',true)->paginate(7);
        return view('announcements.index',compact('announcements'));

    }


}
