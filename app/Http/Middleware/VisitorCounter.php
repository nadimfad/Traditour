<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorCounter
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();

        if (!Visitor::where('ip_address', $ip)->exists()) {
            Visitor::create(['ip_address' => $ip]);
        }

        return $next($request);
    }
}
