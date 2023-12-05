<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $patient = $request->route('patient'); 

        if (Auth::check() && Auth::user()->id === $patient->user_id) {
            return $next($request); 
        }

        return redirect()->route('home.patients')->with('error', 'No tienes permiso para acceder a este paciente.');
   
    }

  
}
