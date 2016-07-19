<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCriacaoDoProjecto
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
     return app(\App\Http\Middleware\VerificarExistenciaDoProjecto::class)->handle($request, function($request) use ($next) {
        $data = $request->json()->all();

        if (isset($data['tituloPro'])) {
            if(isset($data['areaAplic'])){
                if(isset($data['descr'])){
                    if(isset($data['tutor'])){
                        $request->{'projecto_data'} = $data;
                          return $next($request);
                    }
                }
            }
          
        } else {
          abort(400);
        }
      });
    }
}
