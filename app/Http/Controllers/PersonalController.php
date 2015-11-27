<?php

namespace App\Http\Controllers;

use App\Model\Volunteer;
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
        $volunteer = Volunteer::find($volunteerId);

        return view('personal.beans')->with([
            'volunteer' => $volunteer
        ]);
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
        return('注册成功');
    }
}
