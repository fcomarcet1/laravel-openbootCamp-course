<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $auxRole = 1;
        $user = Auth::user();
        $id = $request->input('id');

        if ($role === 'all') {
            // add role to request
            $request->merge([
                'role' => $role,
                'date-of-permission' => microtime(true),
                'id' => $id!=null,
            ]);
            return $next($request);
        }
        $auxRole = 1;
        $idRole = ($role === 'user') ? 1 : 2;
        $user = Auth::user();
        $roleOfTheUser = 1;

        if ($roleOfTheUser === $idRole) {
            $request->merge([
                'role' => $role,
                'date-of-permission' => microtime(true)
            ]);
            return $next($request);
        }
        return response('los usuarios de tipo'. $role .' no pueden acceder a esta seccion', 403);
    }
}
