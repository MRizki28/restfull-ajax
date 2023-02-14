<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\Providers\JWT as ProvidersJWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use Firebase\JWT\JWT;
use Namshi\JOSE\JWS;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
     public function handle(Request $request, Closure $next, ...$level)
    {
        // if (in_array($request->user()->level, $level)) {
        //     return $next($request);
        // }
        // return redirect('dashboard');
    }

}
