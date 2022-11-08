<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao)
    {
        if($metodo_autenticacao == 'padrao'){
            echo "Verificar usuário e senha no banco de dados";
        }
        if(true){
            return $next($request);
        }else{

        return response('Acesso negado! A rota exige autenticação!');
        }
    }
}