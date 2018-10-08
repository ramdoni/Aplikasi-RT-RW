<?php

namespace App\Http\Middleware;

use Closure;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $access_id)
    {
        if($request->user()->access_id != $access_id)
        {
            if($request->user()->access_id == 1)
                return redirect()->to('admin')->with('message-error', 'Access Denied');
            elseif($request->user()->access_id == 2)
                return redirect()->to('anggota')->with('message-error', 'Access Denied');
            else
                return redirect()->to('home');
        }

        return $next($request);
    }
}
