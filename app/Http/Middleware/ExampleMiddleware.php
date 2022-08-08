<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExampleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $next -> lo que ocurrirá despues de que se ejecute el middleware
        // $request -> informacion

        // Do something before the request is handled
        // check if the user is authenticated
        if (Auth::check()) {
            return $next($request);
        }
    }
}
