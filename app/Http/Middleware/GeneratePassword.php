<?php

namespace App\Http\Middleware;

use App\Models\Validations_User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GeneratePassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->route('token');
        $validationCount = Validations_User::where('token', $token)->count();
    
        if ($validationCount > 0) {
            return $next($request);
        } else {
            return redirect()->route('admin.index');
        }
    }
}
