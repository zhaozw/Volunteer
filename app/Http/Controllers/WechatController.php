<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\Server;

class WechatController extends Controller
{
    public function serve(Request $request)
    {
        $appId      = env('WX_APPID');
        $secret     = env('WX_SECRET');
        $token      = env('WX_TOKEN');
        $encodingASEKey = env('WX_ENCODING_ASEKEY');

        $server = new Server($appId, $token, $encodingASEKey);
        $server->on('message', function ($message) {
            return Message::make('text')->content('您好！');
        });

        $result = $server->serve();
        return $result;
    }

    public function menu() {
        $menuService        = new Menu(env('WX_APPID'), env('WX_SECRET'));
        $buttonWDF          = new MenuItem("WDF", 'view', url('/wdf'));
        $buttonActivity     = new MenuItem("我的活动", 'view', url('/activity/index'));
        $buttonPersonal     = new MenuItem("个人中心");

        $menus = [
            $buttonWDF,
            $buttonActivity,
            $buttonPersonal->buttons([
                new MenuItem('个人信息', 'view', url('/personal/information')),
                new MenuItem('我的迈豆', 'view', url('/personal/beans')),
            ]),
        ];
        $menuService->set($menus);
    }

} /*class*/
