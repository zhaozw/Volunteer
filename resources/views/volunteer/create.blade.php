<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>注册账号</title>
    <link rel="stylesheet" href="/css/weui.min.css">
    <link rel="stylesheet" href="/css/volunteer.css">
    <!-- 引入 jQuery 库 -->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

    <script type="application/javascript">

        var validateMobile = function() {
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

        var verifyPassword = function() {
            var password = document.getElementById('password').value;
            var repassword = document.getElementById('repassword').value;

            if (password.length == 0) {
                document.getElementById('txt_warn').innerText = '请输入密码！';
                document.getElementById('password').focus();
                return false;
            }

            if (password.length < 6) {
                document.getElementById('txt_warn').innerText = '密码不足6位！';
                document.getElementById('password').focus();
                return false;
            }

            if (repassword.length == 0) {
                document.getElementById('txt_warn').innerText = '请确认密码！';
                document.getElementById('repassword').focus();
                return false;
            }

            if (repassword.length < 6) {
                document.getElementById('txt_warn').innerText = '密码不足6位！';
                document.getElementById('repassword').focus();
                return false;
            }

            if (password != repassword) {
                document.getElementById('txt_warn').innerText = '两次输入密码不一致！';
                document.getElementById('repassword').focus();
                return false;
            }

            return true;
        }

        var onUnitClick = function(id) {
            document.getElementById('unit').value = id;
            if (id =='1') {
                var name = '诺和诺德';
            }
            else {
                var name = '迈德科技';
            }
            document.getElementById('text_unit').value = name;
            $(function () {
                $('.mask').removeClass('weui_fade_toggle');
                $('.mask').css("display","none");
                $('.weui_actionsheet').removeClass('weui_actionsheet_toggle');
            });

        }

        $(document).ready(function(){

            $('.showActionSheet').click(function(){
                $(this).next().children(0).addClass('weui_fade_toggle');
                $(this).next().children(0).css("display","block");
                $(this).next().children(1).addClass('weui_actionsheet_toggle');
            });

            $('.actionsheet_cancel').click(function(){
                $('.mask').removeClass('weui_fade_toggle');
                $('.mask').css("display","none");
                $('.weui_actionsheet').removeClass('weui_actionsheet_toggle');
            });

            $('.nextActionSheet').click(function(){
                $(this).parents('.actionSheet_wrap').next().children(0).addClass('weui_fade_toggle');
                $(this).parents('.actionSheet_wrap').next().children(0).css("display","block");
                $(this).parents('.actionSheet_wrap').next().children(1).addClass('weui_actionsheet_toggle');
            })


            $("#btn_save").on('click',function () {
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

//                if (!verifyPassword()) {
//                    result = false;
//                    return result;
//                }

                if($("#unit").val() == '-1'){
                    document.getElementById('txt_warn').innerText = '请选择公司！';
                    result = false;
                    return result;
                }

                if($("#unit").val() == '1'){
                    var number = document.getElementById('number').value;
                    if(number.length == 0) {
                        document.getElementById('txt_warn').innerText = '诺和员工请填写工号！';
                        result = false;
                        return result;
                    }
                }

                if(result == true) {
                    var name = $("#name").val();
                    var phone = $("#phone").val();
                    var unit_id = $("#unit").val();
                    var number = "";
                    var email = "";
                    if(unit_id == '1') {
                        number = $("#number").val();
                        email = number + '@novonordisk.com';
                    }
                    document.getElementById('txt_warn').innerText = '正在提交！';
                    var requestUrl = '/volunteer/store-self';
                    $.ajax({
                        url: requestUrl,
                        data: {
                            name: name,
                            phone: phone,
//                            password:password,
                            unit_id:unit_id,
                            number:number,
                            email:email
                        },
                        type: "post",
                        dataType: "json",
                        success: function (json) {
                            if (json.result == '1') {
                                document.getElementById('txt_warn').innerText = '提交成功！';
                                window.location.href = '/volunteer/success';
                            }

                            if (json.result == '-1') {
                                document.getElementById('txt_warn').innerText = '提交失败！';
                                window.location.href = '/home/error';
                            }
                        },
                        error: function (xhr, status, errorThrown) {
                            alert("Sorry, there was a problem!");
                        }
                    });
                }

            });
        });
    </script>
</head>

<body class="body-gray" ontouchstart>
<div class="container" style="margin-top:35%">
    <div id="sign_up">

        <form action="" method="post">

            <div class="weui_cells_title">请填写您的注册信息</div>

            <div class="weui_cells weui_cells_form weui_cells_access">
                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">姓&emsp;名</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="name" type="text" class="weui_input" placeholder="请输入姓名">
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">手机号</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="phone" type="text" class="weui_input" placeholder="请输入手机号">
                    </div>
                </div>

                <div class="weui_cell showActionSheet">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">公&emsp;司</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="text_unit" type="text" class="weui_input" disabled placeholder="请选择公司">
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>

                <div class="actionSheet_wrap">
                    <div class="mask"></div>
                    <div class="weui_actionsheet">
                        <div class="weui_actionsheet_menu">
                            @foreach($units as $unit)
                                <div class="weui_actionsheet_cell  actionsheet_cancel" onclick="onUnitClick({{$unit->id}})">{{$unit->full_name}}</div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <div class="weui_cells weui_cells_form weui_cells_access">
                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">工&emsp;号</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input id="number" type="text" class="weui_input" placeholder="请输入员工编码">
                    </div>
                </div>
            </div>

            <p id="txt_warn" style="text-align:center;color:red"></p>
            <a id="btn_save" class="weui_btn">注&emsp;册</a>

            <input type="hidden" id="unit" value="-1">

        </form>
    </div>
</div>

</body>

</html>
