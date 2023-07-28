<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('sessionkey')){
            $value = $request->session()->get('sessionkey');
            $decryptedvalue = decrypt($value);

            $userinfo = explode(',', $decryptedvalue);

            if($userinfo[1] === 'admin'){
                return redirect('/admin');
            } else {
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
