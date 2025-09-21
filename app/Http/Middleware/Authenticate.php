<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('user_id')) {
            return redirect('/login'); // redirect ke halaman login
        }

        return $next($request);
    }
}
