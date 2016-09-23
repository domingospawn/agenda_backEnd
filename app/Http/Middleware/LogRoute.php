<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;

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
        Log::info('method: '.$request->method());
        //Log::info('text: '.$request->text);
        //Log::info('Request: '.$request);
        $rep = $next($request);

        if ($request->isMethod('OPTIONS')) {
          Log::info('metodo OPTIONS retorna 200');
          return redirect('home');
          //return response(200);
        }

        Log::info('Rota executada');

        return $rep;
    }
}
