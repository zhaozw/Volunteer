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
            if (Carbon::now()->diffInMinutes($volunteer->updated_at) > 30) {
                $volunteer->openid      = $user['openid'];
                $volunteer->headimgurl  = $user['headimgurl'];
                $volunteer->nickname    = $user['nickname'];
                $volunteer->save();
            } /*if>>*/
            return $next($request);
        } else {
            return redirect('/volunteer/create');
        } /*else>*/
    }
}
