<?php

namespace App\Http\Middleware;

use App\Model\Volunteer;
use Carbon\Carbon;
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
    public function handle($request, Closure $next)
    {
        $user = \Session::get('logged_user');

        if ($volunteer = Volunteer::where('openid', $user['openid'])->first()) {
            //如果该openid已经注册过
            //如果距离上次更新超过30分钟则更新数据
            if (Carbon::now()->diffInMinutes($volunteer->updated_at) > 30) {
                $volunteer->openid = $user['openid'];
                $volunteer->headimgurl = $user['headimgurl'];
                $volunteer->nickname = $user['nickname'];

                $volunteer->save();
            }
            return $next($request);
        } else {
            //如果openid未被注册过，则重定向到注册页
            return redirect('/volunteer/create');
        }
    }
}
