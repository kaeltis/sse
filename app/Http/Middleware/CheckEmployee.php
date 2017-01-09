<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmployee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->user()->isEmployee()) {
            flash('You have to be an employee to see this!', 'danger');
            return redirect('/');
        }

        return $next($request);
    }
}
