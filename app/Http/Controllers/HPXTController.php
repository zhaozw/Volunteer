<?php

namespace App\Http\Controllers;

use App\Model\HPXTClassMode;
use App\Model\HPXTClassScale;
use Illuminate\Http\Request;

use App\Model\Volunteer;
use App\Model\HPXTClass;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HPXTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('hpxt.huangpu_index');
    }

    public function introduction() {
        return view('hpxt.huangpu_profile');
    }

    public function procedure() {
        return view('hpxt.huangpu_profile');
    }

    public function document() {
        return view('hpxt.huangpu_document');
    }

    public function documentPpt() {
        return view('hpxt.huangpu_ppt');
    }

    public function documentAgreement() {
        return view('hpxt.huangpu_agreement');
    }

    public function classManage() {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();
        $classes = HPXTClass::where('volunteer_id', $volunteer->id)->get();
        return view('hpxt.class_manage')->with([
            'classes' => $classes
        ]);
    }

    public function classApplication() {
        $classModes = HPXTClassMode::all();
        $classScales = HPXTClassScale::all();

        return view('hpxt.class_application')->with([
            'modes'=>$classModes,
            'scales'=>$classScales
        ]);
    }

    public function classApplicationAddDoctor() {
        return view('hpxt.class_application_add_doctor');
    }

    public function classApplicationAddAssistant() {
        return view('hpxt.class_application_add_assistant');
    }

    public function classStore(Request $request) {
        $user = \Session::get('logged_user');
        $volunteer = Volunteer::where('openid', $user['openid'])->first();

        $validator = \Validator::make($request->all(), [

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } /*if>*/

    }

}
