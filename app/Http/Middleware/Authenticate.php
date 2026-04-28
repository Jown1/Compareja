<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('logged_in')) {
            return redirect()->route('auth.login')
                ->with('login_error', 'Você precisa estar logado para acessar esta página!');
        }

        return $next($request);
    }
}
