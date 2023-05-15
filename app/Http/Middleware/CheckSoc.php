<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSoc
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authenticated = auth()->user();

        if ($authenticated->role_id != 3 && $authenticated->departament != 7) {
            return redirect('/')->with('msg', 'Você não pode acessar essa página');
        }
        return $next($request);
    }
}
