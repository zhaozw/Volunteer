<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>空中课堂报名</title>

    <link rel="stylesheet" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/volunteer.css">

    <!-- 引入 jQuery 库 -->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="/js/jquerysession.js"></script>

    <script type="application/javascript">


        $(document).ready(function () {
            console.log("document loaded");


            var validateMobile = function () {
                var mobile = document.getElementById('phone').value;
                if (mobile.length == 0) {
                    document.getElementById('txt_warn').innerText = '请输入手机号码！';
                    document.getElementById('phone').focus();
                    return false;
                }
                if (mobile.length != 11) {
                    document.getElementById('txt_warn').innerText = '请输入有效的手机号码！';
                    document.getElementById('phone').focus();
                    return false;
                }

                var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
                if (!myreg.test(mobile)) {
                    document.getElementById('txt_warn').innerText = '请输入有效的手机号码！';
                    document.getElementById('phone').focus();
                    return false;
                }
                return true;
            }

            function verifyAddress() {
                var email = document.getElementById('mail').value;
                if (email.length > 0) {
                    if (email.length == 0) {
                        document.getElementById('txt_warn').innerText = '请输入邮箱！';
                        document.getElementById('mail').focus();
                        return false;
                    }
                    var pattern = /^[\w-]+@([\w-]+\.)+[\w-]+$/;
                    flag = pattern.test(email);
                    if (!flag) {
                        document.getElementById('txt_warn').innerText = '请输入正确邮箱！';
                        document.getElementById('mail').focus();
                        return false;
                    }
                }
                return true;
            };


            $("#btn_save").on('click', function () {
                var result = true;
                var name = document.getElementById('name').value;
                if (name.length == 0) {
                    document.getElementById('txt_warn').innerText = '请输入姓名！';
                    document.getElementById('name').focus();
                    result = false;
                    return result;
                }

                if (!validateMobile()) {
                    result = false;
                    return result;
                }


                if (result == true) {
                    var name = $("#name").val();
                    var phone = $("#phone").val();
                    document.getElementById('txt_warn').innerText = '正在提交！';

                    var requestUrl = "http://docmate3.mime.org.cn:82/AppClient/RegHandler.ashx?" +
                            "action=wechatreg&appid=APP20150701101838";
                    $.ajax({
                        type: "get",
                        async: false,
                        url: requestUrl,
                        dataType: "jsonp",
                        jsonp: "callbackparam",//服务端用于接收callback调用的function名的参数
                        jsonpCallback: "success_jsonpCallback",//callback的function名称
                        data: {
                            mobile: phone,
                            pwd: '',
                            hospital: '',
                            nickname: name
                        },
                        success: function (data) {
                            console.log(data);

                        },
                        error: function (xhr, status, errorThrown) {
                            alert("Sorry, there was a problem!");
                        },
                        complete: function (xhr, status) {

                        }
                    });
                }

            });

        });

    </script>
</head>
<body class="body-gray" ontouchstart>
<div class="container">
    <div id="sign_up">

        <form action="" method="post">

            <div class="weui_cells_title">请为学员填写报名信息</div>

            <div class="weui_cells weui_cells_form weui_cells_access">


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">姓&emsp;名</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input name="name" id="name" type="text" class="weui_input" placeholder="请输入姓名">
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">手机号</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input name="phone" id="phone" type="text" class="weui_input" placeholder="请输入手机号">
                    </div>
                </div>

            </div>

            <p id="txt_warn" class="warning"></p>
            {{--<label id="label" class="warning">请输入。。。。</label>--}}
            {{--<a class="weui_btn">确&emsp;认</a>--}}
            <button id="btn_save" type="button" class="weui_btn weui_btn_primary" style="width: 90%;">确&emsp;认</button>
        </form>
    </div>
</div>

</body>
</html>