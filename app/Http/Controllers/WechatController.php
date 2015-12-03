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
        $appId = 'wxa9e89e54e2bf14e8';
        $secret = '1acbf1817fc4b541fd5689792b0030d4';
        $token = 'Med123456';
        $encodingASEKey = 'pIXMRDPcrBwwcSa61JjBuSelaCdJV6oWmlkxuFqxyN5';


        $server = new Server($appId, $token, $encodingASEKey);

        $server->on('message', function ($message) {
            \Log::info('ppp' . $message);
            return Message::make('text')->content('您好！');
        });

        $result = $server->serve();

        return $result;
    }
}
