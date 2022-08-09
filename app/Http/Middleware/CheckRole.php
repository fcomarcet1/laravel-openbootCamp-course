<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string $role
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role = 'user')
    {
        /*$haveIdParameter = $request->input('id');
        $user = Auth::user();*/
        $auxRole = 1;
        $user = Auth::user();

        $idRole = ($role === 'user') ? 1 : 2;

        if ($auxRole === $idRole) {
            return $next($request);
        }
        return response('los usuarios de tipo'. $role .' no pueden acceder a esta seccion', 403);
    }
}
