<?php

namespace App\Http\Middleware;

use Closure;
use Overtrue\Wechat\Auth;

class WechatMiddleware
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
        \Log::info('WechatMiddleware');
        if (\Session::has('logged_user')) {
            \Log::info('has logged_user session');
            return $next($request);
        } else {
            \Log::info('no logged_user session');
            $appId  = env('WX_APPID');
            $secret = env('WX_SECRET');
            $auth = new Auth($appId, $secret);
            \Log::info('auth:'.$auth);
            $user = $auth->authorize(url($request->fullUrl()));
            \Log::info('user:'.$user);
            \Session::put('logged_user', $user->all());
            return $next($request);
        }
    }
}
