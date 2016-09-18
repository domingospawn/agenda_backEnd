<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::info('Log of routes');
        Log::info('');
        Log::info('Request: '.$request);
        //log::info($request);
        Log::info('');
        Log::info('');

        return $next($request);
    }
}
