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
        $this->middleware('auth.volunteer');

        $this->middleware('auth.access', [
            'except' => [
                'create',
                'store'
            ]
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name'      => 'required',
            'phone'     => 'required|digits:11|unique:volunteers,phone',
            'email' => 'required|email|unique:volunteers,email',
            'unit_id'   => 'required|exists:units,id'
        ]);

        /* redirect to error page.*/
        if ($validator->fails()) {
            return redirect('volunteer/create')->withErrors($validator)->withInput();
        } /*if>*/

        $volunteer = new Volunteer();
        $user = \Session::get('logged_user');
        $volunteer->name    = $request->name;
        $volunteer->phone   = $request->phone;
        $volunteer->email   = $request->email;
        $volunteer->unit_id = $request->unit_id;

        $volunteer->headimgurl = $user['headimgurl'];
        $volunteer->nickname = $user['nickname'];
        $volunteer->openid = $user['openid'];

        $volunteer->save();

        return view('register_succeed');//TODO 弹到注册成功
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function showSelf(Request $request)
    {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();

        return view('volunteer.show')->with([
            'volunteer' => $volunteer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    public function editSelf(Request $request)
    {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();

        if (null == $volunteer) {
            return view('volunteer.edit_error');
        } /*if>*/

        return view('volunteer.edit')->with([
            'volunteer' => $volunteer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|unique:volunteers, phone',
            'email' => 'required|email',
        ]);
        if ($validator->fails()) {
            return view('volunteer.update_error');
        } /*if>*/

        $volunteer = \App\Model\Volunteer::where('openid', '=', $id)->first();
        if (null == $volunteer) {
            return view('volunteer.update_error');
        } /*if>*/

        $volunteer->phone = $request->phone;
        $volunteer->email = $request->email;
        $volunteer->save();
    }

    public function updateSelf(Request $request)
    {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();

        $validator = \Validator::make($request->all(), [
            'phone' => 'required|digits:11|unique:volunteers,phone,' . $volunteer->id,
            'email' => 'required|email|unique:volunteers,email,' . $volunteer->id,
        ]);

        if ($validator->fails()) {
            return view('volunteer.update_error');
        }

        if (null == $volunteer) {
            return view('volunteer.update_error');
        }

        $volunteer->phone = $request->phone;
        $volunteer->email = $request->email;
        $volunteer->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /*
     * get all beans by volunteer
     * */
    public function beans(Request $request)
    {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();

        return view('volunteer.beans')->with([
            'volunteer' => $volunteer
        ]);
    }

    /*
     * get all doctors by volunteer
     * */
    public function doctors(Request $request)
    {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        $doctors = VolunteerDoctor::where('volunteer_id', '=', $volunteer->id);

        return view('personal.doctors');
    }
}
