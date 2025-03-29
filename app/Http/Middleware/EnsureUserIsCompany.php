<?php

// app/Http/Middleware/EnsureUserIsCompany.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsCompany
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()?->type !== 'company') {
            abort(403, 'Access denied');
        }

        return $next($request);
    }
}
