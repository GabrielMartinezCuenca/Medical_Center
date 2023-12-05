<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class AppointmentAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $appointment = $request -> route('request');
        if (Auth::check() && Auth::user()->id === $appointment->patient->user->id) {
            return $next($request); 
        }

        return redirect()->route('home.requests')->with('error', 'No tienes permiso para acceder a este paciente.');
   
    }
}
