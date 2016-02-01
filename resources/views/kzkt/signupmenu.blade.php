<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>完成报名</title>

    <link rel="stylesheet" href="/css/volunteer.css">
    <link rel="stylesheet" href="/css/weui.min.css">

    <script type="application/javascript">
        function goEdit(id) {
            window.location.href = '/activity/kzkt/viewCard?id='+id;
        }
    </script>
</head>
<body class="body-gray" ontouchstart>
<div class="container">

    <form action="" method="post">

        <div class="weui_cells_title">您总共为{{$count}}名学员报名成功，请将空中课堂听课证转发给学员。</div>

        <div class="">

            @foreach($data as $index)
                <div class="weui_cell student_card">
                    <div class="weui_cell_hd">
                        <img src="/image/kzkt/classicon.png" alt="">
                        <img src="/image/kzkt/classphoto.png" alt="">
                    </div>
                    <div class="weui_cell_bd">
                        <a onclick="goEdit({{$index['id']}})">
                            <span>点击查看详情</span>

                            <p>姓名：{{$index['name']}}</p>
                            <p>班级：{{$index['className']}}</p>
                            <p>手机号：{{$index['phone']}}</p>
                        </a>
                        <a href="">
                            <span>点<br>击<br>转<br>发</span>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <button class="weui_btn" id="checkJsApi">checkJsApi</button>

        <button class="weui_btn" id="onMenuShareAppMessage">onMenuShareAppMessage</button>

    </form>
</div>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    wx.config(<?php echo $js->config(array('checkJsApi','onMenuShareAppMessage'), true, true) ?>);


    wx.ready(function () {
        // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
        document.querySelector('#checkJsApi').onclick = function () {
            wx.checkJsApi({
                jsApiList: [
                    'onMenuShareAppMessage',
                ],
                success: function (res) {
                    alert(JSON.stringify(res));
                }
            });
        };

        document.querySelector('#onMenuShareAppMessage').onclick = function () {
            wx.onMenuShareAppMessage({
                title: '空中课堂报名',
                desc: '学员报名账户信息',
                link: 'http://volunteers.mime.org.cn/activity/kzkt/viewCard?id=1',
                imgUrl: '',
                trigger: function (res) {
                    alert('用户点击发送给朋友');
                },
                success: function (res) {
                    alert('已分享');
                },
                cancel: function (res) {
                    alert('已取消');
                },
                fail: function (res) {
                    alert("fail:"+JSON.stringify(res));
                }
            });
            alert('已注册获取“发送给朋友”状态事件');
        };

    });

    wx.error(function (res) {
        alert("error:"+res.errMsg);
    });
</script>
</body>
</html>