<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class UserLogin
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
        $adminEmail = User::where('role', 'admin')->first()->email;
        $inputEmail = $request->email;
        if($inputEmail === $adminEmail) return redirect()->back();

        return $next($request);
    }
}
