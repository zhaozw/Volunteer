<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>完成报名</title>

    <link rel="stylesheet" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/volunteer.css">
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

    <script type="application/javascript">
        var request = function (paras) {
            var url = location.href;
            var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
            var paraObj = {}
            for (i = 0; j = paraString[i]; i++) {
                paraObj[j.substring(0, j.indexOf("=")).
                        toLowerCase()] = j
                        .substring(j.indexOf("=") + 1, j.length);

            }
            var returnValue = paraObj[paras.toLowerCase()];
            if (typeof(returnValue) == "undefined") {
                return "";
            } else {
                return returnValue;
            }
        }

        var getData = function (id){
            var requestUrl = '/kzkt/findSingleRegister';
            $.ajax({
                type : "get",
                data: {
                    id: id
                },
                dataType : "json",
                url : requestUrl,
                success: function (json) {
                    if(json.result == '1') {
//                        $("#name1").val(json.data.name);
//                        $("#name2").val(json.data.name);
//                        $("#phone").val(json.data.phone);
//                        $("#pwd").val(json.data.password);
                        document.getElementById('name1').innerText = json.data.name;
                        document.getElementById('name2').innerText = json.data.name;
                        document.getElementById('phone').innerText = json.data.phone;
                        document.getElementById('pwd').innerText = json.password;
                        document.getElementById('class_type').innerText = json.className;
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                },
                complete: function (xhr, status) {
//                    alert("The request is complete!");
                }
            });
        }

        $(document).ready(function(){
            var id = request("id");
            if(id != null) {
                getData(id);
            }
            var type = request("type");
            if(type == '2'){
                $("#show_share").hide();
            }

            $("#show_share").on('click', function () {
                $("#show_share").hide();
            });
        });
    </script>
    <style type="text/css">
        img.x
        {
            position:absolute;
            left:0px;
            top:0px;
            z-index:1;
            width:100%;
        }
    </style>
</head>
<body class="body-gray" ontouchstart>
<div class="container">

    <img id="show_share" src="/image/kzkt/1.png" class="x"/>

    <div class="learning_card">
        <div class="weui_cell ">
            <div class="weui_cell_bd">
                <p>听课证</p>
                <img src="/image/kzkt/class.png" alt="">
            </div>
        </div>
        <div class="weui_cell ">
            <div class="weui_cell_bd">
                <p><label id="name1"></label> 医生，欢迎你参加2016空中课堂-<label id="class_type"></label>，为方便接收课前通知和课后学习资料，请关注微信公众号。</p>
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd qrcode">
                <img class="img_100" src="/image/kzkt/2dcodedocmate.png" alt="">
            </div>
            <div class="weui_cell_bd">
                <p>长按识别二维码</p>
                <p>学员：<label id="name2"></label></p>
                <p>账号：<label id="phone"></label></p>
                <p>登录密码：<label id="pwd"></label></p>
                <p>班级邀请码：12345678</p>
            </div>
        </div>
        <img class="img_100" src="/image/kzkt/introduce.png" alt="">
    </div>
    <div class="click_button">
        <img class="img_100" src="/image/kzkt/forward2.png" alt="">
    </div>

</div>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
    wx.config(<?php echo $js->config(array('checkJsApi','onMenuShareAppMessage'), false, false) ?>);


    wx.ready(function () {

        wx.checkJsApi({
            jsApiList: [
                'onMenuShareAppMessage'
            ],
            success: function (res) {
//                alert(JSON.stringify(res));
            }
        });

        var id = request("id");
        wx.onMenuShareAppMessage({
            title: '空中课堂报名', // 分享标题
            desc: '学员报名账户信息', // 分享描述
            link: 'http://volunteers.mime.org.cn/kzkt/viewCard?type=2&id='+id, // 分享链接
            imgUrl: 'http://volunteers.mime.org.cn/image/kzkt/airclass.png', // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
//                    alert('已分享');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
//                    alert('已取消');
            }
        });

    });

    wx.error(function (res) {
        alert("error:" + res.errMsg);
    });
</script>
</body>
</html>