<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfessor
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
        if (!$request->user()->isProfessor()) {
            flash('You have to be a professor to see this!', 'danger');
            return redirect('/');
        }

        return $next($request);
    }
}
