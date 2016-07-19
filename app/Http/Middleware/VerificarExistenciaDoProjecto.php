<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaDoProjecto
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
      $projecto_id = $request->route()->parameter('projectos');
      $projecto = \App\Projecto::find($projecto_id);

      if (isset($projecto)) {
          $request->{'projecto'} = $projecto;
          return $next($request);
      } else {
        abort(404);
      }
    }
}
