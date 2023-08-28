<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHandler
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
        if($request->session()->missing('sessionkey')){
            return redirect()->route('LoginScreen', ['err' => 4]);
            die();
        }

        $value = $request->session()->get('sessionkey');
        $decryptedvalue = decrypt($value);

        $userinfo = explode(',', $decryptedvalue);

        if ($userinfo[1] != 'user') {
            return redirect()->route('LoginScreen', ['err' => 5]);
            die();
        }

        $request->attributes->add(['userinfo' => $userinfo]);
        return $next($request);
    }
}
