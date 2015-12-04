<?php

namespace App\Http\Middleware;

use Closure;
use Overtrue\Wechat\Auth;

class VolunteerAuthMiddleware
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
//        $inputOpenId = $request->input('openid');
//
//        if ($inputOpenId and $user = Volunteer::where('openid', '=', $inputOpenId)->first()) {
//            $inputArray = $request->all();
//            $inputArray['volunteer_id'] = $user->id;
//            $inputArray['unit_id'] = $user->unit_id;
//            $request->replace($inputArray);
//
//            return $next($request);
//        } /*if>*/
//
//        return redirect('/volunteer/create');


        if (\Session::has('logged_user')) {
            //如果已有登录用户，直接通过
            return $next($request);
        } else {
            $appId = env('WX_APPID');
            $secret = env('WX_SECRET');

            $auth = new Auth($appId, $secret);
            $user = $auth->authorize(url($request->fullUrl()));

            \Session::put('logged_user', $user->all());
            return $next($request);
        }
    }
}
