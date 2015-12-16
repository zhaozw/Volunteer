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
    function __construct()
    {
        // TODO: Implement __construct() method.
        $this->middleware('auth.volunteer');
        $this->middleware('auth.access');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('activity.hpxt.huangpu_index');
    }

    public function introduction() {
        return view('activity.hpxt.huangpu_profile');
    }

    public function procedure() {
        return view('activity.hpxt.huangpu_profile');
    }

    public function document() {
        return view('activity.hpxt.huangpu_document');
    }

    public function documentPpt() {
        return view('activity.hpxt.huangpu_ppt');
    }

    public function documentAgreement() {
        return view('activity.hpxt.huangpu_agreement');
    }

    public function classManage() {
        $user = \Session::get('logged_user');
//        dd($user);
        $volunteer = Volunteer::where('openid', $user['openid'])->first();
//        dd($volunteer);
        $classes = HPXTClass::where('volunteer_id', $volunteer->id)->get();
//        dd($classes);
        return view('activity.hpxt.class_manage')->with([
            'classes' => $classes
        ]);
    }

    public function classApplication() {
//        $classModes = HPXTClassMode::all();
//        dd($classModes);
//        $classScales = HPXTClassScale::all();
//        dd($classScales);

        return view('activity.hpxt.class_application')->with([
            'modes'=>$classModes,
            'scales'=>$classScales
        ]);
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
