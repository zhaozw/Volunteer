<?php

namespace App\Http\Controllers;

use App\Model\KZKTClass;
use Hamcrest\Text\StringContains;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Model\Doctor;
use \App\Model\Hospital;
use \App\Model\HPXTClass;
use \App\Model\Volunteer;
use \App\Model\RepresentDetail;
use \App\Model\InviteNumber;
use DB;
use Illuminate\Support\Facades\Log;
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
        $list = DB::select('select distinct province_id, province from hospitals order by province_id');
        return response()->json(['list'=>$list]);
    }

    function getCity(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select distinct city_id, city from hospitals where province_id = :id
              order by city_id', ['id' => $id]);
        return response()->json(['list'=>$list]);
    }

    function getCountry(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select distinct country_id,country from hospitals where city_id = :id
              order by country_id', ['id' => $id]);
        return response()->json(['list'=>$list]);
    }

    function getHospital(Request $request)
    {
        $id = $request->input('id');
        $list = DB::select('select id,hospital from hospitals where country_id= :id
              order by hospital_id', ['id' => $id]);
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
        $volunteerId = 0;
        if ($openid) {
            $volunteer = Volunteer::where('openid', $openid['openid'])->first();
            $volunteerId = $volunteer->id;
        }
        $doctor = Doctor::where('phone', $request->input('phone'))->first();
        $hospital = Hospital::where('id', $request->input('hospital'))->first();

        if ($doctor) {//医生数据已经存在时
            $kzktData = KZKTClass::where('doctor_id', $doctor->id)->first();
            if ($kzktData) {//空中课堂报名数据存在时
                return response()->json(['result' => '-1']);
            }
            else {
                $kzktData = new KZKTClass();
                $kzktData->volunteer_id = $volunteerId;
                $kzktData->doctor_id = $doctor->id;
                $kzktData->login_number = substr($request->input('phone'), 5);
                $kzktData->type = $request->input('classType');
                $invite_number = InviteNumber::where('status', false)->first();
                if ($doctor->email) {
                    $kzktData->status = true;
                    $kzktData->invite_number = $invite_number->number;
                    $invite_number->status = true;
                    $result = '1';
                }
                else {
                    $kzktData->status = false;
                    $result = '2';
                }
                $kzktData->save();
                $invite_number->save();

                return response()->json(['result' => $result, 'id'=>$doctor->id, 'hospital'=>$hospital->hospital_id]);
            }
        }
        else {

            $doctor = new Doctor();
            $doctor->name = $request->input('name');
            $doctor->phone = $request->input('phone');
            $doctor->hospital_id = $hospital->id;
            $doctor->office = $request->input('department');
//            $doctor->title = $request->input('title');
            $doctor->email = $request->input('mail');
            $doctor->qq = $request->input('oicq');
            $doctor->save();

            $kzktData = new KZKTClass();
            $kzktData->volunteer_id = $volunteerId;
            $kzktData->doctor_id = $doctor->id;
            $kzktData->login_number = substr($request->input('phone'), 5);
            $kzktData->type = $request->input('classType');
            $invite_number = InviteNumber::where('status', false)->first();
            if ($doctor->email) {
                $kzktData->status = true;
                $kzktData->invite_number = $invite_number->number;
                $invite_number->status = true;
                $result = '1';
            }
            else {
                $kzktData->status = false;
                $result = '2';
            }
            $kzktData->save();
            $invite_number->save();

            return response()->json(['result' => $result, 'id'=>$doctor->id, 'hospital'=>$hospital->hospital_id]);
        }

    }

    function updateClassroom(Request $request)
    {
        $id = $request->input('id');
        $doctor = Doctor::where('id', $id)->first();
        $kzktData = KZKTClass::where('doctor_id', $doctor->id)->first();
        $hospital = Hospital::where('id', $request->input('hospital'))->first();
        if($doctor != null && $kzktData != null) {
            $doctor->name = $request->input('name');
            $doctor->phone = $request->input('phone');
            $doctor->hospital_id = $hospital->id;
            $doctor->office = $request->input('department');
            $doctor->email = $request->input('mail');
            $doctor->qq = $request->input('oicq');
            $doctor->save();

            $kzktData->login_number = substr($request->input('phone'), 5);
            $kzktData->type = $request->input('classType');
            $invite_number = InviteNumber::where('status', false)->first();
            if ($doctor->email) {
                $kzktData->status = true;
                $kzktData->invite_number = $invite_number->number;
                $invite_number->status = true;
                $result = '1';
            } else {
                $kzktData->status = false;
                $result = '2';
            }
            $kzktData->save();
            $invite_number->save();

            return response()->json(['result' => $result, 'id' => $doctor->id, 'hospital'=>$hospital->hospital_id]);
        }
        else {
            return response()->json(['result' => '-1']);
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

    function findSingleRegister(Request $request)
    {
        $id = $request->input('id');
        $doctor = Doctor::where('id', $id)->first();
        $kzktData = KZKTClass::where('doctor_id', $doctor->id)->first();
        $hospital = Hospital::where('id', $doctor->hospital_id)->first();
        $address = $hospital->province . '-' . $hospital->city . '-' . $hospital->country;
        $province = $hospital->province_id;
        $city = $hospital->city_id;
        $country = $hospital->country_id;

        if ($doctor != null && $kzktData != null) {
            $className = null;
            if ($kzktData->type == 1) {
                $className = '基础班';
            } else if ($kzktData->type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            return response()->json(['result' => '1', 'data' => $doctor, 'address' => $address,
                'className' => $className, 'password' => $kzktData->login_number, 'invite' => $kzktData->invite_number,
                'kzktType' => $kzktData->type, 'hosp' => $hospital->id, 'province' => $province,
                'city' => $city, 'country' => $country, 'hospital' => $hospital->hospital]);
        } else {
            return response()->json(['result' => '-1']);
        }
    }

    function findAllRegister(Request $request)
    {
        $openid = \Session::get('logged_user');
        $volunteerId = 0;
        if ($openid) {
            $volunteer = Volunteer::where('openid', $openid['openid'])->first();
            $volunteerId = $volunteer->id;
        }
        $kzktDatas = KZKTClass::where('volunteer_id', $volunteerId)
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->get();

        $array = array();
        $count = 0;
        foreach ($kzktDatas as $kzkt) {
            $count = $count + 1;
            $doctor = Doctor::where('id', $kzkt->doctor_id)->first();
            $name = $doctor->name;
            $id = $doctor->id;
            $phone = $doctor->phone;
            $time = (string)$kzkt ->created_at->year.'-'
                .sprintf("%02d", $kzkt ->created_at->month).'-'
                .sprintf("%02d", $kzkt ->created_at->day);

            $className = null;
            if ($kzkt->type == 1) {
                $className = '基础班';
            } else if ($kzkt->type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            $row = array('name' => $name, 'id' => $id, 'className' => $className, 'phone' => $phone, 'time' => $time);
            array_push($array, $row);
        }

        $unDatas = KZKTClass::where('volunteer_id', $volunteerId)
            ->where('status', false)
            ->orderBy('id', 'desc')
            ->get();

        $unarray = array();
        $uncount = 0;
        foreach ($unDatas as $kzkt) {
            $uncount = $uncount + 1;
            $doctor = Doctor::where('id', $kzkt->doctor_id)->first();
            $name = $doctor->name;
            $id = $doctor->id;
            $phone = $doctor->phone;
            $time = $kzkt ->create_at;
            $className = null;
            if ($kzkt->type == 1) {
                $className = '基础班';
            } else if ($kzkt->type == 2) {
                $className = '高级班';
            } else {
                $className = '精品班';
            }

            $row = array('name' => $name, 'id' => $id, 'className' => $className, 'phone' => $phone, 'time' => $time);
            array_push($unarray, $row);
        }

        return view('kzkt.signupmenu', ['count'=>$count, 'data' => $array, 'undata' => $unarray]);
    }

    function addHospital(Request $request)
    {
        $province = $request->input('province');
        $city = $request->input('city');
        $country = $request->input('country');
        $name = $request->input('hospital');

        $hospital = Hospital::where('province_id', $province)
            ->where('city_id', $city)
            ->where('country_id', $country)
            ->orderBy('hospital_id', 'desc')
            ->first();

        if($hospital) {
            $arr = explode('-',$hospital->hospital_id);
//            dd($arr);

//            $length = strlen($hospital->country_id);
//            $strRealId = substr($hospital->hospital_id, $length);
//            $realId = intval($strRealId, 10);
            $realId = intval($arr[1], 10);
            $realId = $realId + 1;
            $temp = sprintf("%02d", $realId);//生成2位数，不足前面补0
            $newId = $arr[0] . '-' . $temp;
//            dd($newId);

            $data = new Hospital();
            $data->province = $hospital->province;
            $data->province_id = $hospital->province_id;
            $data->city = $hospital->city;
            $data->city_id = $hospital->city_id;
            $data->country = $hospital->country;
            $data->country_id = $hospital->country_id;
            $data->hospital = $name;
            $data->hospital_id = $newId;
            $data->save();

            return response()->json(['result' => '1']);
        }
        else {
            return response()->json(['result' => '-1']);
        }

    }

    function viewHospital(Request $request)
    {
        return view('kzkt.addhospital');
    }

    function classdetail1(Request $request)
    {
        return view('kzkt.classdetail1');
    }

    function classdetail2(Request $request)
    {
        return view('kzkt.classdetail2');
    }

    function classdetail3(Request $request)
    {
        return view('kzkt.classdetail3');
    }

    function showflow(Request $request)
    {
        return view('kzkt.showflow');
    }

    function showfail(Request $request)
    {
        $appId = env('WX_APPID');
        $secret = env('WX_SECRET');

        $js = new Js($appId, $secret);

        return view('kzkt.signupfailed', ['js' => $js]);
    }

    function checkuser(Request $request)
    {
        $openid = \Session::get('logged_user');
        $data = null;

        if ($openid) {
            $volunteer = Volunteer::where('openid', $openid['openid'])->first();

            $data = RepresentDetail::where('represent_name', $volunteer->name)
                ->where('represent_code',  strtoupper($volunteer->number))
                ->first();
        }

        if ($data) {
            return response()->json(['result' => '1']);
        } else {
            if($volunteer->number == '9999') {
                return response()->json(['result' => '1']);
            }
            else {
                return response()->json(['result' => '-1']);
            }
        }
    }
}
