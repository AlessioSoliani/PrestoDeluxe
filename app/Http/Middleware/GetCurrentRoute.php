<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GetCurrentRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //creato middleware per la rimozzione di alcuni elementi che se admin,utenti loggati normali,revisori 
        //o utenti non loggati non devono più vedere 
        //(es: btn 'registrati' se un utente è gia registrato, btn 'diventa revisore' se l'utente è gia revisore)
        $currentRoute = $request->route()->getName();
        view()->share('currentRoute', $currentRoute);
        return $next($request);
    }
}
