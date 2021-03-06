<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware {

    public function handle($request, Closure $next) {
        if (in_array(Auth::user()->role_id, [1, 2])) {
            return $next($request);
        }
        return redirect('admin');
    }

}
