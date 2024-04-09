<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsRevisor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

     //custom middleware creato per gestire gli utenti che sono revisori
    public function handle(Request $request, Closure $next): Response
    {
   //se l'utente(check=loggato) e se è anche revisore.. 
        if (Auth::check() && Auth::user()->is_revisor){
            //procedi
            return $next($request);

        }else{//reindiriziamo l'utente alla home con un messaggio di accesso negato->(Nel kernel registra il path)
            return redirect('/')->with('accessoNegato','Accesso consentito solo ai revisori');
        }
    }
}
