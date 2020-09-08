<?php

namespace App\Http\Middleware;

use Closure;

class CekMember
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
        if(\Auth::guard('member')->check() == false){
            return redirect('/'); //pengunjung web belum login sebagai peserta
        }
        return $next($request);
    }

}
