<?php

namespace App\Http\Middleware;

use Closure;

class ValidarProjecto
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
         $data=$request->json()->all();
         if(isset($data['tituloPro'])) {
             if(isset($data['areaAplic'])) {
                 if(isset($data['descr'])) { 
                    // if(isset($data['imagem'])) {
                         if(isset($data['tutor'])) {
                             if(isset($data['curso_id'])){
                                return $next($request);
                             }
                         }
                     //}
                 }
             }
        }else{
            abort(400);
       }
    }
       
    }
