<?php

namespace App\Http\Middleware;

use App\Model\Volunteer;
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
        $inputOpenId = $request->input('openid');

        if ($inputOpenId and $user = Volunteer::where('openid', '=', $inputOpenId)->first()) {
            $inputArray = $request->all();
            $inputArray['volunteer_id'] = $user->id;
            $inputArray['unit_id'] = $user->unit_id;
            $request->replace($inputArray);

            return $next($request);
        } /*if>*/

        return redirect()->route('volunteer/create');
    }
}
