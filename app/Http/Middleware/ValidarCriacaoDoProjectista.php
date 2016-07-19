<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCriacaoDoProjectista
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
       return app(\App\Http\Middleware\VerificarExistenciaDoProjectista::class)->handle($request, function($request) use ($next) {
        $data = $request->json()->all();

        if (isset($data['apelido'])) {
            if(isset($data['nome'])){
                if(isset($data['numero_telfone'])){
                    if(isset($data['curso_id'])){
                        $request->{'projectista_data'} = $data;
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
