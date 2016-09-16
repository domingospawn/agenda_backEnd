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
      Log::info('Cors - Request: '.$request);

      if ($request->isMethod('post'))
      {
        return response('', 200)
          ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
          ->header('Access-Control-Allow-Headers', 'accept, content-type, x-xsrf-token, x-csrf-token');
      }

      return $next($request);
        //->header('Access-Control-Allow-Origin', '*')
        //->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        //->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Authorization, X-Request-With')
        //->header('Access-Control-Allow-Credentials', 'true');

      Log::info('Cors middleware entended');

      return $response;
    }
}
