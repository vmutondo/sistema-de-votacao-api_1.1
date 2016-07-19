<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaDoVisitante
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
       $visitante_id = $request->route()->parameter('visitantes');
      $visitante = \App\Visitante::find( $visitante_id);

      if (isset($visitante)) {
          $request->{'visitante'} = $visitante;
          return $next($request);
      } else {
        abort(404);
      }
    }
}
