<?php

namespace App\Http\Controllers;

use App\Model\Volunteer_bean;
use App\Model\Volunteer_doctor;
use App\Model\VolunteerBean;
use App\Model\VolunteerDoctor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{

    /*
     * get all beans by volunteer
     * */
    public function beans(Request $request) {
        $volunteerId = $request->input('volunteer_id');
        $beans = VolunteerBean::where('volunteer_id', '=', $volunteerId)->orderby('action_at', 'desc');

        return view('personal.beans');
    }

    /*
     * get all doctors by volunteer
     * */
    public function doctors(Request $request) {
        $volunteerId = $request->input('volunteer_id');
        $doctors = VolunteerDoctor::where('volunteer_id', '=', $volunteerId);

        return view('personal.doctors');
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
