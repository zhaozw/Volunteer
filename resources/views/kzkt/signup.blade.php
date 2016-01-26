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

    <script type="application/javascript">

        var changeCity = function (id) {
            $(function () {
                var branchId = $('#' + id).attr('value');
                var location = document.getElementById(id).innerText;
                $('#text_location').val('');
                $('#text_location').val(location);
                $('#text_province').val(branchId);
                console.log("ready" + branchId + location);
                var requestCity = '/activity/kzkt/city';
                $.ajax({
                    url: requestCity,
                    data: {
                        id: branchId
                    },
                    type: "get",
                    dataType: "json",
                    success: function (json) {
                        $("#select_city").empty();
                        var strHtml = "";
                        $(json.list).each(function () {
                            var id = "ss_" + this.SA_CITY_ID;
                            strHtml += "<div id='ss_" + this.SA_CITY_ID + "' class='weui_actionsheet_cell nextActionSheet' " +
                            "value='" + this.SA_CITY_ID + "' onclick='changeCountry(\"" + id + "\")'>" + this.SA_CITY + "</div>";
                        });
                        $("#select_city").html(strHtml);

                        $("#select_province").parents('.actionSheet_wrap').next().children(0).addClass('weui_fade_toggle');
                        $("#select_province").parents('.actionSheet_wrap').next().children(0).css("display", "block");
                        $("#select_province").parents('.actionSheet_wrap').next().children(1).addClass('weui_actionsheet_toggle');

                    },
                    error: function (xhr, status, errorThrown) {
                        alert("Sorry, there was a problem!");
                    }
                });

            });
        }

        var changeCountry = function (id) {
            $(function () {
                var branchId = $('#' + id).attr('value');
                var location = document.getElementById(id).innerText;
                var tmp = $('#text_location').val();
                $('#text_location').val(tmp + "-" + location);
                $('#text_city').val(branchId);
                //alert(branchId);
                console.log("ready" + branchId);
                var requestCountry = '/activity/kzkt/country';
                $.ajax({
                    url: requestCountry,
                    data: {
                        id: branchId
                    },
                    type: "get",
                    dataType: "json",
                    success: function (json) {
                        $("#select_country").empty();
                        var strHtml = "";
                        $(json.list).each(function () {
                            var id = "ss_" + this.SA_COUNTRY_ID;
                            strHtml += "<div id='ss_" + this.SA_COUNTRY_ID + "' class='weui_actionsheet_cell actionsheet_cancel' " +
                            "value='" + this.SA_COUNTRY_ID + "' onclick='changeHospital(\"" + id + "\")'>" + this.SA_COUNTRY + "</div>";
                        });
                        $("#select_country").html(strHtml);

                        $("#select_city").parents('.actionSheet_wrap').next().children(0).addClass('weui_fade_toggle');
                        $("#select_city").parents('.actionSheet_wrap').next().children(0).css("display", "block");
                        $("#select_city").parents('.actionSheet_wrap').next().children(1).addClass('weui_actionsheet_toggle');

                        $("#select_hospital").empty();
                        var strHtml1 = "<option value='-1' selected=true>" + "请选择" + "</option>";
                        $("#select_hospital").html(strHtml1);

                        $("#select_department").val("-1");
                        $("#select_title").val("-1");
                    },
                    error: function (xhr, status, errorThrown) {
                        alert("Sorry, there was a problem!");
                    }
                });
            });
        }

        var changeHospital= function (id) {
            $(function () {
                var branchId = $('#' + id).attr('value');
                var location = document.getElementById(id).innerText;
                var tmp = $('#text_location').val();
                $('#text_location').val(tmp+"-"+location);
                $('#text_country').val(branchId);
                var requestHospital = '/activity/kzkt/hospital';
                $.ajax({
                    url : requestHospital,
                    data: {
                        id: branchId
                    },
                    type : "get",
                    dataType : "json",
                    success: function (json) {
                        $("#select_hospital").empty();
                        var strHtml="<option value='-1' selected=true>"+"请选择"+"</option>";
                        $(json.list).each(function () {
                            strHtml+="<option value='"+this.SA_HOSPITAL_ID+"'>"+this.SA_HOSPITAL+"</option>";
                        });
                        $("#select_hospital").html(strHtml);

                        $("#select_department").val("-1");
                        $("#select_title").val("-1");

                        $('.mask').removeClass('weui_fade_toggle');
                        $('.mask').css("display","none");
                        $('.weui_actionsheet').removeClass('weui_actionsheet_toggle');

                    },
                    error: function (xhr, status, errorThrown) {
                        alert("Sorry, there was a problem!");
                    }
                });
            });
        }
        $( window ).load(function() {
            console.log( "window loaded" );
        });


        $(document).ready(function(){
            console.log( "document loaded" );

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

            var requestUrl = '/activity/kzkt/province';
            $.ajax({
                type: "get",
                dataType: "json",
                url: requestUrl,
                success: function (json) {
                    $("#select_province").empty();
                    var strHtml = "";

                    $(json.list).each(function () {
                        var id = "ss_" + this.SA_PRIOVINCE_ID;
                        strHtml += "<div id='ss_" + this.SA_PRIOVINCE_ID + "' class='weui_actionsheet_cell nextActionSheet' " +
                        "value='" + this.SA_PRIOVINCE_ID + "' onclick='changeCity(\"" + id + "\")'>" + this.SA_PROVINCE + "</div>";
                    });
                    $("#select_province").html(strHtml);
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


            var requestDepartment = '/activity/kzkt/department';
            $.ajax({
                type: "get",
                dataType: "json",
                url: requestDepartment,
                success: function (json) {
                    $("#select_department").empty();
                    var strHtml = "<option value='-1' selected=true>" + "请选择" + "</option>";
                    $(json.list).each(function () {
                        strHtml += "<option value='" + this.DEPT_ID + "'>" + this.DEPT_NAME + "</option>";
                    });
                    $("#select_department").html(strHtml);
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                    console.log("Error: " + errorThrown);
                    console.log("Status: " + status);
                    console.dir(xhr);
                },
                complete: function (xhr, status) {
                }
            });

            var addSelOption = function(jq) { //方法addSelOption : 为匹配对象添加一项"请选择"， jq ： jQuery对象
                //创建option对象，并设置文本为"请选择"，value值为-1
                var opt = $("<option/>").text("请选择").attr("value", "-1");
                //将option对象添加到select中
                jq.append(opt);
            };

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

            function verifyAddress() {
                var email = document.getElementById('mail').value;
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
                return true;
            };


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

                if($("#select_class").val() == '-1'){
                    document.getElementById('txt_warn').innerText = '请选择班级！';
                    result = false;
                    return result;
                }


                if(document.getElementById('text_province').value.length == 0){
                    document.getElementById('txt_warn').innerText = '请选择省市县！';
                    result = false;
                    return result;
                }

                if(document.getElementById('text_city').value.length == 0){
                    document.getElementById('txt_warn').innerText = '请选择省市县！';
                    result = false;
                    return result;
                }

                if(document.getElementById('text_country').value.length == 0){
                    document.getElementById('txt_warn').innerText = '请选择省市县！';
                    result = false;
                    return result;
                }

                if($("#select_hospital").val() == '-1'){
                    document.getElementById('txt_warn').innerText = '请选择医院！';
                    result = false;
                    return result;
                }

                if($("#select_department").val() == '-1'){
                    document.getElementById('txt_warn').innerText = '请选择科室！';
                    result = false;
                    return result;
                }

                if($("#select_title").val() == '-1'){
                    document.getElementById('txt_warn').innerText = '请选择职称！';
                    result = false;
                    return result;
                }

                if(!verifyAddress()){
                    result = false;
                    return result;
                }

                if(result == true) {
                    var name = $("#name").val();
                    var phone = $("#phone").val();
                    var classType = $("#select_class").val();
                    var province = $("#text_province").val();
                    var city = $("#text_city").val();
                    var country = $("#text_country").val();
                    var hospital = $("#select_hospital").val();
                    var department = $("#select_department").val();
                    var title = $("#select_title").val();
                    var mail = $("#mail").val();
                    var oicq = $("#OICQ").val();
                    document.getElementById('txt_warn').innerText = '正在提交！';
                    var requestUrl = '/activity/kzkt/addClassroom';
                    $.ajax({
                        url: requestUrl,
                        data: {
                            name: name,
                            phone: phone,
                            classType: classType,
                            province: province,
                            city: city,
                            country: country,
                            hospital: hospital,
                            department: department,
                            title: title,
                            mail: mail,
                            oicq: oicq
                        },
                        type: "post",
                        dataType: "json",
                        success: function (json) {
                            console.log('1');
                            if (json.result == '-1') {
                                document.getElementById('txt_warn').innerText = '该手机号已被注册过！';
                            }
                            if (json.result == '1') {
                                console.log('aaa');
                                document.getElementById('txt_warn').innerText = '提交成功！';
                                window.location.href = '/activity/kzkt/findPreRegister';
                                console.log('bbb');
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

                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">课程班</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <select name="select_class" id="select_class" type="text" class="weui_input">
                            <option value="-1">请选择班级</option>
                            <option value="1">基础班</option>
                            <option value="2">高级班</option>
                            <option value="3">精品班</option>
                        </select>
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>
            </div>


            <div class="weui_cells weui_cells_form weui_cells_access">


                <div class="weui_cell showActionSheet">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">省市县</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary location_select">
                        <input name="text_location" id="text_location" type="text" class="weui_input" disabled placeholder="请选择省市县">
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>

                <div class="actionSheet_wrap">
                    <div class="mask"></div>
                    <div class="weui_actionsheet">
                        <div id="select_province" class="weui_actionsheet_menu">
                            <div class="weui_actionsheet_cell nextActionSheet">示例菜单1</div>
                        </div>
                    </div>
                </div>

                <div class="actionSheet_wrap">
                    <div class="mask"></div>
                    <div class="weui_actionsheet">
                        <div id="select_city" class="weui_actionsheet_menu">
                            <div class="weui_actionsheet_cell nextActionSheet">示例菜单1-1</div>
                        </div>
                    </div>
                </div>

                <div class="actionSheet_wrap">
                    <div class="mask"></div>
                    <div class="weui_actionsheet">
                        <div id="select_country" class="weui_actionsheet_menu">
                            <div class="weui_actionsheet_cell actionsheet_cancel">示例菜单1-1-1</div>
                        </div>
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">医&emsp;院</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <select name="select_hospital" id="select_hospital" type="text" class="weui_input">
                            <option value="-1">请选择</option>
                        </select>
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">科&emsp;室</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <select name="select_department" id="select_department" type="text" class="weui_input">
                            <option value="-1">请选择</option>
                        </select>
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">职&emsp;称</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <select name="select_title" id="select_title" type="text" class="weui_input">
                            <option value="-1">请选择</option>
                            <option value="1">住院医师</option>
                            <option value="2">主治医师</option>
                            <option value="3">副主任医师</option>
                            <option value="4">主任医师</option>
                        </select>
                    </div>
                    <div class="weui_cell_ft"></div>
                </div>

            </div>

            <div class="weui_cells weui_cells_form weui_cells_access">


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label for="" class="weui_label">邮&emsp;箱</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input name="mail" id="mail" type="text" class="weui_input" placeholder="请输入邮箱">
                    </div>
                </div>


                <div class="weui_cell">
                    <div class="weui_cell_hd">
                        <label id="inputQQ" for="" class="weui_label">QQ（选填）</label>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <input name="OICQ" id="OICQ" type="text" class="weui_input" placeholder="请填写QQ">
                    </div>
                </div>
            </div>

            <p class="tips">为保证及时收到课程通知和课件信息，建议填写QQ号！</p>
            <p id="txt_warn" class="warning">请输入。。。。</p>
            {{--<label id="label" class="warning">请输入。。。。</label>--}}
            {{--<a class="weui_btn">确&emsp;认</a>--}}
            <button id="btn_save" type="button" class="weui_btn" style="width: 90%;">确&emsp;认</button>
            <input type="hidden" id="text_province">
            <input type="hidden" id="text_city">
            <input type="hidden" id="text_country">
        </form>
    </div>
</div>

</body>
</html>