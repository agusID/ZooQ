<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Role;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // if (!$request->user()->is_admin) {
        //     return 'Access denied Sir..!';
        // }
        // return $next($request);
        $user = Auth::user();
        if($user->roles->role_name == 'administrator') {
            return $next($request);
        }
    
        return redirect('dashboard');
    }
}
