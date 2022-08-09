<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ValidateFormMiddleware
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
        $input = $request->except('_token');
        $formValid = true;
        $error = [];

        if (empty($input['name'])) {
            $formValid = false;
            $error[] = 'Name is required';
        }
        if (empty($input['email'])) {
            $formValid = false;
            $error[] = 'Email is required';
        }
        if (empty($input['telephone'])) {
            $formValid = false;
            $error[] = 'Telephone is required';
        }
        if (strlen($input['telephone']) !== 9) {
            $formValid = false;
            $error[] = 'Telephone not valid';
        }

        if (empty($input['message'])) {
            $formValid = false;
            $error[] = 'Message is required';
        }

        if (!$formValid) {
             //\Log::debug('Form not valid');
            return redirect()->back()->withErrors($error)->withInput();
        }
        return $next($request);
    }
}
