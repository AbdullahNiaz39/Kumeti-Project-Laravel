<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('login')) {

        } else {
            $request->session()->flash('error', 'Acess Deined');
            return redirect('/login_admin');
        }
        return $next($request);

    }
}
