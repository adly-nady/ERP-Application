<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class if_login
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('users')->check()||Auth::guard('admins')->check()||Auth::guard('top_admins')->check())
        {   
            $response = $next($request);
            return $response->header('Cache-Control','nocache, no-store, max-age=0, must-revalidate')
                ->header('Pragma','no-cache')
                ->header('Expires','Sun, 02 Jan 1990 00:00:00 GMT');
        }else{
            return redirect()->route('login');
        }
    }
}
