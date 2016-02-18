<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>注册账号</title>
    <link rel="stylesheet" href="/css/medtech.css">
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

        $(document).ready(function(){

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
                    var password = $("#password").val();
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

<body>
<div class="row" id="sign_up">
    <div class="small-10 small-centered large-4 large-centered columns">

        <form>
            <div class="row column log-in-form">
                <h4 class="text-center">注册账号</h4>
                <label>
                    <input id="name" class="columns" type="text" placeholder="请输入姓名">
                    <span class="columns text-center"><img src="/image/volunteer/u34.png" alt=""></span>
                </label>
                <label>
                    <input id="phone" class="columns" type="text" placeholder="请输入手机号">
                    <span class="columns text-center"><img src="/image/volunteer/u32.png" alt=""></span>
                </label>

                {{--<label>--}}
                    {{--<input id="password" class="columns" type="password" placeholder="请输入密码">--}}
                    {{--<span class="columns text-center"><img src="/image/volunteer/u51.png" alt=""></span>--}}
                {{--</label>--}}

                {{--<label>--}}
                    {{--<input id="repassword" class="columns" type="password" placeholder="请确认密码">--}}
                    {{--<span class="columns text-center"><img src="/image/volunteer/u51.png" alt=""></span>--}}
                {{--</label>--}}

                <label>
                    <select id="unit" class="columns">
                        <option value="-1">请选择</option>
                        @foreach($units as $unit)
                            <option value="{{$unit->id}}">{{$unit->full_name}}</option>
                        @endforeach
                    </select>
                    <span class="columns text-center"><img src="/image/volunteer/u28.png" alt=""></span>
                </label>

                <label>
                    <input id="number" class="columns" type="text" placeholder="员工编码，例如：NMRO">
                    <span class="columns text-center"><img src="/image/volunteer/u42.png" alt=""></span>
                </label>
                <p><a id="btn_save" type="button" class="button expanded">注册</a></p>
                <p id="txt_warn" style="text-align:center;color:red"></p>
            </div>
        </form>

    </div>
</div>

</body>
</html>
