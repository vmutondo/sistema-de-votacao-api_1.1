<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCriacaoDoVisistante
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
       return app(\App\Http\Middleware\VerificarExistenciaDoVisitante::class)->handle($request, function($request) use ($next) {
        $data = $request->json()->all();

        if (isset($data['nome'])) {
            if(isset($data['tipoDoc'])){
                if(isset($data['numero_Documento'])){
                    if(isset($data['contacto'])){
                        if(isset($data['email'])){
                            if(isset($data['tipo_visitante'])){
                                 $request->{'visitante_data'} = $data;
                                   return $next($request);
                            }
                        }
                    }
                }
            } 
        } else {
          abort(400);
        }
      });
    }
}
