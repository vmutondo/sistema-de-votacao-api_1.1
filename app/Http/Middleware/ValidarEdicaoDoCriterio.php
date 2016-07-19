<?php

namespace App\Http\Middleware;

use Closure;

class ValidarEdicaoDoCriterio
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
      return app(VerificarExistenciaDoCriterio::class)->handle($request, function($request) use ($next) {
        $data = $request->json()->all();

        if ($data['nome']) {
          $request->{'criterio_data'} = $data;
          return $next($request);
        } else {
          abort(400);
        }
      });
    }
}
