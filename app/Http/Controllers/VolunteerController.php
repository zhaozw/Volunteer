<?php

namespace App\Http\Controllers;

use App\Model\Unit;
use App\Model\Volunteer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolunteerController extends Controller
{
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
    public function create()
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
            'email'     => 'required|unique:volunteers,email',
            'unit_id'   => 'required|exists:units,id'
        ]);

        /* redirect to error page.*/
        if ($validator->fails()) {
            return redirect('volunteer/create')->withErrors($validator)->withInput();
        } /*if>*/

        $volunteer = new Volunteer();
        $volunteer->name    = $request->name;
        $volunteer->phone   = $request->phone;
        $volunteer->email   = $request->email;
        $volunteer->unit_id = $request->unit_id;
        $volunteer->save();

        return redirect('/personal/index');//TODO 弹到注册成功
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $volunteer = \App\Model\Volunteer::where('openid', '=', $id)->first();
        if (null == $volunteer) {
            return redirect('volunteer/create');
        } /*if>*/

        return view('volunteer.show')->with(['volunteer' => $volunteer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $volunteer = \App\Model\Volunteer::where('openid', '=', $id)->first();
        if (null == $volunteer) {
            return view('volunteer.edit_error');
        } /*if>*/

        return view('volunteer.edit')->with(['volunteer' => $volunteer]);
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
        //
        $validator = \Validator::make($request->all(), [
            'phone'     => 'required|unique:volunteers, phone',
            'email'     => 'required',
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
}
