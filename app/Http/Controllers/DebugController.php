<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Curl\Curl;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function debugIndex(Request $request)
    {
//        $appId = 'wxa9e89e54e2bf14e8';
//        $secret = '1acbf1817fc4b541fd5689792b0030d4';
//        $token = 'Med123456';
//        $encodingASEKey = 'pIXMRDPcrBwwcSa61JjBuSelaCdJV6oWmlkxuFqxyN5';
//
//
//        $server = new Server($appId, $token, $encodingASEKey);
//
//        $server->on('message', function($message) {
//            return Message::make('text')->content('您好！');
//        });

        if ($this->checkSignature()) {
            return $request->input('echostr');
        }
    }

    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

        $token = 'Med123456';
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);

        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    public function getCreateMenu()
    {
        $json = collect([
            'button' => [
                [
                    'name' => 'WDF',
                    'type' => 'view',
                    'url' => url('/wdf')
                ],
                [
                    'name' => '我的活动',
                    'type' => 'view',
                    'url' => url('/activity/index')
                ],
                [
                    'name' => '个人中心',
                    'sub_button' => [
                        [
                            'name' => '个人信息',
                            'type' => 'view',
                            'url' => url('/volunteer/show-self')
                        ],
                        [
                            'name' => '我的迈豆',
                            'type' => 'view',
                            'url' => url('/volunteer/beans')
                        ],
                        [
                            'name' => '迈豆商城',
                            'type' => 'view',
                            'url' => url('/store')
                        ]
                    ]
                ]
            ]
        ])->toJson(JSON_UNESCAPED_UNICODE);


        $curl = new Curl();
        $curl->setOpt(CURLOPT_HTTPHEADER, ["content-type: application/x-www-form-urlencoded;charset=UTF-8"]);
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=';
        $access_token = 'tcaP56mMSn9q-E-5tBVJLNi6fqWb7pgKijXqV2bhHGk8SkhQ3gAxV_5aHM7JbA3oh75_aBSotE_b39Yt2xyKCCJ3Xyoilj4jfx0EXVfQCZYHZHgADAOGO';
        $curl->post($url . $access_token, $json);

        return $curl->response;
    }

    public function getTest()
    {
        return url('/wdf');
    }
}
