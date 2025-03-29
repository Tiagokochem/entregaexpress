<?php

// app/Http/Middleware/EnsureUserIsCourier.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsCourier
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->type !== 'courier') {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
