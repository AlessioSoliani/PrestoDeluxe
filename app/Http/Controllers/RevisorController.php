<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        return view('revisor.index', compact('announcement_to_check'));
    }
    //accept e reject 2 funzioni legate alle rotte pach dei form presenti nella /revisor/index
    // per l'accettazione o il rifiuto della richiesta per diventare
    // un revisore del sito ambedue prendoono come parametro l'annuncio e ..  
    public function acceptAnnouncement(Announcement $announcement){
        //...richiamo la funzione setAccepted creata nell'modello Announcement..
        $announcement->setAccepted(true);
        //reindiriziamo con un messaggio affermativo 
        return redirect()->back()->with('message','annuncio accettato');
    }

    public function rejectAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
                //reindiriziamo con un messaggio negativo

        return redirect()->back()->with('message','annuncio rifiutato');
    }
}
