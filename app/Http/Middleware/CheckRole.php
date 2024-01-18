<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (in_array($request->user()->roles, $role)) {
            return $next($request);
        } elseif (Auth::user()->roles == 1) {
            return Redirect::to('/dashboard');
        } elseif (Auth::user()->roles == 2) {
            return Redirect::to('/dashboard');
        } elseif (Auth::user()->roles == 4) {
            return Redirect::to('/dashboard');
        } elseif (Auth::user()->roles == 5) {
            return Redirect::to('/dashboard');
        } elseif (Auth::user()->roles == 6) {
            return Redirect::to('/403');
        } elseif (Auth::user()->roles == 7) {
            return Redirect::to('/403');
        } else {
            return Redirect::to('/dashboard');
        }
    }
}
