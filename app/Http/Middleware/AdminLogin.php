<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminLogin
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
          if($request->email){
              $findUserRole = User::where('email', $request->email)->first()->role;
              if($findUserRole !== 'admin') return redirect()->route('login');
          }
        return $next($request);
    }
}
