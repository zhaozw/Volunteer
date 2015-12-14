<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function classmanage() {
        return view('activity.hpxt.classmanage');
    }

    public function classapplication() {
        return view('activity.hpxt.classapplication');
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
