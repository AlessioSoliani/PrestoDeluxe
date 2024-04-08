<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PrestoDeluxe:MakeUserRevisor{email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rendi l\'utente un revisore Deluxe';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //catturiamo l'utente tramite la mail che ci arriva 
        $user = User::where('email',$this->argument('email'))->first(); 
        //se l'utente non è stato trovato viene mostrato un messaggio di errore
        if(!$user){
            $this->error('Utente non trovato');
            return;
        }

        // se l'utente è stato trovato, viene reso un revisore impostando il suo valore a true
        // la modifica viene salvata all'interno del DB
        // viene mostrato un messaggio di successo 
        $user->is_revisor = true;
        $user->save();
        $this->info("L'utente {$user->name} è ora un revisore.");
    }
}
