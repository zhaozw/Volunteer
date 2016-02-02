<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Activity;
use App\Model\Volunteer;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.wechat');
        $this->middleware('auth.access');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = \Session::get('logged_user');
        if (!$user) {
            return redirect('/home/error');
        } /*if>*/

        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        if (!$volunteer) {
            return redirect('/home/error');
        } /*if>*/

        $activities = $volunteer->unit->activities;
        if ((!$activities) || (0 == $activities->count())) {
            return view('activity.no_activities');
        } /*if>*/

        return view('activity.all_activities')->with([
            'volunteer' => $volunteer,
            'activities' => $activities
        ]);
    }

} /*class*/
