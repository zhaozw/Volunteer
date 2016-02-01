<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Model\AirClassroom;
use DB;
use Overtrue\Wechat\Js;


class KZKTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kzkt.signupindex');
    }

    function getProvince()
    {
        $list = DB::select('select distinct SA_PRIOVINCE_ID, SA_PROVINCE from bz_sys_area order by SA_PRIOVINCE_ID');
        return response()->json(['list'=>$list]);
    }

    function getCity(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select distinct SA_CITY_ID,SA_CITY from bz_sys_area where SA_PRIOVINCE_ID = :id
              order by SA_CITY_ID', ['id' => $id]);
        return response()->json(['list'=>$list]);
    }

    function getCountry(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select distinct SA_COUNTRY_ID,SA_COUNTRY from bz_sys_area where SA_CITY_ID = :id
              order by SA_COUNTRY_ID', ['id' => $id]);
        return response()->json(['list'=>$list]);
    }

    function getHospital(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select SA_HOSPITAL_ID,SA_HOSPITAL from bz_sys_area where SA_COUNTRY_ID= :id
              order by SA_HOSPITAL_ID', ['id' => $id]);
        return response()->json(['list'=>$list]);
    }

    function getDepartment(Request $request)
    {
        $list = DB::select('select DEPT_ID,DEPT_NAME from dict_dept');
        return response()->json(['list'=>$list]);
    }

    function addClassroom(Request $request)
    {
        $openid = \Session::get('logged_user');
        $data = AirClassroom::where('phone', $request->input('phone'))->first();
        if ($data) {
            return response()->json(['result' => '-1']);
        }

        $airClassroom = new AirClassroom();
        $airClassroom->name = $request->input('name');
        $airClassroom->phone = $request->input('phone');
        $airClassroom->password = substr($request->input('phone'), 5);
        $airClassroom->course_type = $request->input('classType');
        $airClassroom->province = $request->input('province');
        $airClassroom->city = $request->input('city');
        $airClassroom->country = $request->input('country');
        $airClassroom->hospital = $request->input('hospital');
        $airClassroom->department = $request->input('department');
        $airClassroom->title = $request->input('title');
        $airClassroom->mail = $request->input('mail');
        $airClassroom->oicq = $request->input('oicq');
        $airClassroom->status = 1;
        $airClassroom->openid = $openid['openid'];
        $airClassroom->save();
        return response()->json(['result' => '1']);
    }

    function updateClassroom(Request $request)
    {
        $airClassroom = AirClassroom::where('id', $request->input('id'))->first();
        if (!$airClassroom) {
            return response()->json(['result' => '-1']);
        } else {

            $airClassroom->name = $request->input('name');
            $airClassroom->phone = $request->input('phone');
            $airClassroom->password = substr($request->input('phone'), 5);
            $airClassroom->course_type = $request->input('classType');
            $airClassroom->province = $request->input('province');
            $airClassroom->city = $request->input('city');
            $airClassroom->country = $request->input('country');
            $airClassroom->hospital = $request->input('hospital');
            $airClassroom->department = $request->input('department');
            $airClassroom->title = $request->input('title');
            $airClassroom->mail = $request->input('mail');
            $airClassroom->oicq = $request->input('oicq');
            $airClassroom->save();
            return response()->json(['result' => '1']);
        }
    }

    function checkIn(Request $request)
    {
        $openid = \Session::get('logged_user');
        $airClassrooms = AirClassroom::where('openid', $openid['openid'])->where('status', 1)->get();
        if (!$airClassrooms) {
            return response()->json(['result' => '-1']);
        } else {
            foreach ($airClassrooms as $airClassroom) {
                $airClassroom->status = 2;
                $airClassroom->save();
            }
            return response()->json(['result' => '1']);
        }
    }

    function findPreRegister(Request $request)
    {
        $openid = \Session::get('logged_user');
        $airClassrooms = AirClassroom::where('openid', $openid['openid'])->where('status', 1)->get();
        $array = array();
        foreach ($airClassrooms as $airClassroom) {
            $name = $airClassroom->name;
            $id = $airClassroom->id;
            $className = null;
            if ($airClassroom->course_type == 1) {
                $className = '基础班';
            } else if ($airClassroom->course_type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            $row = array('name' => $name, 'id' => $id, 'className' => $className);
            array_push($array, $row);
        }

        return view('kzkt.signupstudent', ['data' => $array]);
    }

    function findSingleRegister(Request $request)
    {
        $id = $request->input('id');
        $airClassroom = AirClassroom::where('id', $id)->first();
        if ($airClassroom) {
            $province = DB::select('select distinct SA_PROVINCE from bz_sys_area where SA_PRIOVINCE_ID = :id',
                ['id' => $airClassroom->province]);
            $city = DB::select('select distinct SA_CITY from bz_sys_area where SA_CITY_ID = :id',
                ['id' => $airClassroom->city]);
            $country = DB::select('select distinct SA_COUNTRY from bz_sys_area where SA_COUNTRY_ID = :id',
                ['id' => $airClassroom->country]);
            $address = $province[0]->SA_PROVINCE . '-' . $city[0]->SA_CITY . '-' . $country[0]->SA_COUNTRY;
            $className = null;
            if ($airClassroom->course_type == 1) {
                $className = '基础班';
            } else if ($airClassroom->course_type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            return response()->json(['result' => '1', 'data' => $airClassroom, 'address' => $address, 'className' => $className]);
        } else {
            return response()->json(['result' => '-1']);
        }
    }

    function findAllRegister(Request $request)
    {
        $openid = \Session::get('logged_user');
        $airClassrooms = AirClassroom::where('openid', $openid['openid'])
            ->where('status', 2)
            ->orderBy('id', 'desc')
            ->get();

        $array = array();
        $count = 0;
        foreach ($airClassrooms as $airClassroom) {
            $count = $count + 1;
            $name = $airClassroom->name;
            $id = $airClassroom->id;
            $phone = $airClassroom->phone;
            $className = null;
            if ($airClassroom->course_type == 1) {
                $className = '基础班';
            } else if ($airClassroom->course_type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            $row = array('name' => $name, 'id' => $id, 'className' => $className, 'phone' => $phone);
            array_push($array, $row);
        }


        return view('kzkt.signupmenu', ['count'=>$count, 'data' => $array]);
    }

    function viewCard(Request $request)
    {
        $appId  = env('WX_APPID');
        $secret = env('WX_SECRET');

        $js = new Js($appId, $secret);

        return view('kzkt.signupcard',['js' => $js]);
    }

    function signup(Request $request)
    {
        return view('kzkt.signup');
    }

    function editClassroom(Request $request)
    {
        return view('kzkt.signupedit');
    }
}
