<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Model\Unit;
use App\Model\Volunteer;
use App\Model\VolunteerDoctor;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.wechat');
        $this->middleware('auth.access', [
            'except' => [
                'createSelf',
                'storeSelf'
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSelf(Request $request)
    {
        $units = Unit::all();
        return view('volunteer.create')->with(['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSelf(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required|digits:11|unique:volunteers,phone',
            'email'     => 'required|email|unique:volunteers,email',
            'password' => 'required|min:6',
            'unit_id'   => 'required|exists:units,id'
        ]);
        if ($validator->fails()) {
            return redirect('volunteer/create')->withErrors($validator)->withInput();
        } /*if>*/

        $user = \Session::get('logged_user');
        if (!$user) {
            return redirect('home/error');
        } /*if>*/

        $volunteer = new Volunteer();
        $volunteer->name    = $request->name;
        $volunteer->phone   = $request->phone;
        $volunteer->email   = $request->email;
        $volunteer->password   = $request->password;
        $volunteer->unit_id = $request->unit_id;

        $volunteer->headimgurl  = $user['headimgurl'];
        $volunteer->nickname    = $user['nickname'];
        $volunteer->openid      = $user['openid'];
        $volunteer->save();
        return view('volunteer.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showSelf(Request $request)
    {
        \Log::info('showSelf');
        $user = \Session::get('logged_user');
        if (!$user) {
            \Log::info('showSelf no session');
            return redirect('home/error');
        } /*if>*/

        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        if (!$volunteer) {
            \Log::info('showSelf no volunteer');
            return redirect('home/error');
        } /*if>*/

        \Log::info('name'.$volunteer->name);

        return view('volunteer.show')->with(['volunteer' => $volunteer]);
    }

    public function editSelf(Request $request)
    {
        $user = \Session::get('logged_user');
        if (!$user) {
            return redirect('home/error');
        } /*if>*/

        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        if (!$volunteer) {
            return redirect('home/error');
        } /*if>*/

        return view('volunteer.edit')->with(['volunteer' => $volunteer]);
    }

    public function updateSelf(Request $request)
    {
        $user = \Session::get('logged_user');
        if (!$user) {
            return redirect('home/error');
        } /*if>*/

        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        if (!$volunteer) {
            return redirect('home/error');
        } /*if>*/

        $validator = \Validator::make($request->all(), [
            'phone' => 'required|digits:11|unique:volunteers,phone,' . $volunteer->id,
            'email' => 'required|email|unique:volunteers,email,' . $volunteer->id,
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } /*if>*/

        $volunteer->phone = $request->phone;
        $volunteer->email = $request->email;
        $volunteer->save();
        return redirect('/volunteer/show-self');
    }

    /*
     * get all beans by volunteer
     * */
    public function beans(Request $request)
    {
        $user = \Session::get('logged_user');
        if (!$user) {
            return redirect('home/error');
        } /*if>*/

        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        if (!$volunteer) {
            return redirect('home/error');
        } /*if>*/

        return view('volunteer.beans')->with(['volunteer' => $volunteer]);
    }

    public function shop(Request $request)
    {
        return view('volunteer.shop');
    }

    public function about(Request $request)
    {
        return view('volunteer.about');
    }

} /*class*/
