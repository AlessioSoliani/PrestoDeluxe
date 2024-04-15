<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;



class RevisorController extends Controller
{
    public function index()
    {
        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $lastAnnouncement = Announcement::whereNotNull('is_accepted')->get()->last();
        return view('revisor.index', compact('announcement_to_check','lastAnnouncement'));
    }
    //accept e reject 2 funzioni legate alle rotte pach dei form presenti nella /revisor/index
    // per l'accettazione o il rifiuto della richiesta per diventare
    // un revisore del sito ambedue prendoono come parametro l'annuncio e ..  
    public function acceptAnnouncement(Announcement $announcement)
    {
        //...richiamo la funzione setAccepted creata nell'modello Announcement..
        $announcement->setAccepted(true);
        //reindiriziamo con un messaggio affermativo 
        return redirect()->back()->with('message', 'Are you sure?');
    }

    public function rejectAnnouncement(Announcement $announcement)
    {
        $announcement->setAccepted(false);
        
        //reindiriziamo con un messaggio negativo

        return redirect()->back()->with('message', 'Announcement declined');
    }


    public function recoverAnnouncement(Announcement $announcement)

    {
       $announcement->is_accepted=null;          
        $announcement->save();
        return redirect()->back()->with('message', 'Announcement restored');
    }


    public function becomeRevisor()
    {
        /*
        invio una mail all'admin del sito (prestodeluxe@example.com) inviando un oggetto BecomeRevisor 
        al quale stiamo passando i dati dell'utente loggato Auth::user())
        BecomeRevisor è stata creata com php artisan make:mail 
        */
        Mail::to('prestodeluxe@example.com')->send(new BecomeRevisor(Auth::user()));

        return redirect('/')->with(['message', 'Good job! You correctly ask to be a reviewer!']);
    }

    public function makeRevisor(User $user)
    {
        //comando per far diventare revisor l'utente 
        //catturiamo la mail dell'utente e la passiamo come parametro 

        // Richiamiamo il comando MakeUserRevisor di Commands\MakeUserRevisor che imposta a revisore l'utente 
        Artisan::call('PrestoDeluxe:MakeUserRevisor', ['email' => $user->email]);
        return redirect('/')->with(['message', 'Good job! You are a reviewer now!']);
    }

    


   
}
