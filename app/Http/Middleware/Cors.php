<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class Cors
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
      Log::info('Cors middleware called');
      Log::info('Cors - Origin = '.$_SERVER['HTTP_ORIGIN']);
      log::info('Cors data: '.$request);

      $response = $next($request)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');

      Log::info('Cors middleware entended');

      return $response;
    }
}
