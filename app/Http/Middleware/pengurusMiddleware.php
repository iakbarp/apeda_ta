<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class pengurusMiddleware
{
    public function handle($request, Closure $next)
    {

        $cek=Auth::user()->role->name;
        if ($cek=='Bappeda') {
            return $next($request);
        }

        return back();
    }
}
