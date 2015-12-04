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
        $appId = env('WX_APPID');
        $secret = env('WX_SECRET');
        $token = env('WX_TOKEN');
        $encodingASEKey = env('WX_ENCODING_ASEKEY');


        $server = new Server($appId, $token, $encodingASEKey);

        $server->on('message', function ($message) {
            \Log::info('ppp' . $message);
            return Message::make('text')->content('您好！');
        });

        $result = $server->serve();

        return $result;
    }
}
