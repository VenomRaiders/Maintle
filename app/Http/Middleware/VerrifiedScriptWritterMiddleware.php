<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class VerrifiedScriptWritterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role->name == 'user'){
            if(Auth::user()->scriptWriter->is_verified){
                return $next($request);
            } else {
                return redirect()->route('first_script');
            }
        } else {
            return redirect()->route('home');
        }
    }
}
