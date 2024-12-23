<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthUserSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!Auth::check() || Auth::user()->active==false){
          toastr()->warning('Opération échoué ou compte désactivé !');
          return redirect()->route('login.user');
        }
        return $next($request);
    }
}
