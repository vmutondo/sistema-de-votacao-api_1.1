<?php

namespace App\Http\Middleware;

use Closure;

class ValidarEdicaoDoProjectista
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
     return app(\App\Http\Middleware\VerificarExistenciaDoProjeectista::class)->handle($request, function($request) use($next) {
        $data = $request->json()->all();
        if (isset($data['nome'])) {
          $request->{'projectista_data'} = $data;
          return $next($request);
        } else {
          abort(400);
        }
      });
    }
}
