<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //verifica se tem usuario logado em sessao
    //caso nao tenha a excessao vai retornar a tela de login

    ///dd($request);
    if(!Auth::check()){
        
        throw new AuthenticationException();
      }
        
        return $next($request);
    }
}
