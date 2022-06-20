<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;
class CheckTeacherOrAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( !(Auth::check() && Auth::user()->hasRole(['teacher', 'admin']))){
            return response(['message'=>'You need to log in as teacher or admin'],Response::HTTP_NOT_FOUND);
        }
        return $next($request);
    }
}
