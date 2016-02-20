<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>历史报名记录</title>
    <link rel="stylesheet" href="/css/volunteer.css">
    <link rel="stylesheet" href="/css/weui.min.css">

    <!-- 引入 jQuery 库 -->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

    <script type="application/javascript">
        function goViewCard(id) {
            window.location.href = '/kzkt/viewCard?id='+id;
        }

        function goEdit(id) {
            window.location.href = '/kzkt/editClassroom?id='+id;
        }

        $(document).ready(function () {
            $("#tab_a").on('click', function () {
                $("#tab_b").removeClass("active");
                $("#tab_a").attr("class", "active");
                $("#div_history").show();
                $("#div_edit").hide();
            });

            $("#tab_b").on('click', function () {
                $("#tab_a").removeClass("active");
                $("#tab_b").attr("class", "active");
                $("#div_edit").show();
                $("#div_history").hide();
            });

        });
    </script>
</head>
{{--<body class="body-gray" ontouchstart>--}}
{{--<div class="container">--}}

    {{--<form action="" method="post">--}}

        {{--<div class="weui_cells_title">您总共为{{$count}}名学员报名成功，请将空中课堂听课证转发给学员。</div>--}}

        {{--<div class="">--}}

            {{--@foreach($data as $index)--}}
                {{--<div class="weui_cell student_card">--}}
                    {{--<div class="weui_cell_hd">--}}
                        {{--<img src="/image/kzkt/classicon.png" alt="">--}}
                        {{--<img src="/image/kzkt/classphoto.png" alt="">--}}
                    {{--</div>--}}
                    {{--<div class="weui_cell_bd">--}}
                        {{--<a onclick="goEdit({{$index['id']}})">--}}
                            {{--<span>点击查看详情</span>--}}

                            {{--<p>姓名：{{$index['name']}}</p>--}}
                            {{--<p>班级：{{$index['className']}}</p>--}}
                            {{--<p>手机号：{{$index['phone']}}</p>--}}
                        {{--</a>--}}
                        {{--<a href="">--}}
                            {{--<span>点<br>击<br>转<br>发</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--@endforeach--}}

        {{--</div>--}}
    {{--</form>--}}
{{--</div>--}}

</body>

<body class="body-gray">
<!-- 代码部分begin -->

<div class="container">
    <div class="tabs">
        <a id="tab_a" href="#" hidefocus="true" class="active">报名成功学员</a>
        <a id="tab_b" href="#" hidefocus="true">报名未成功学员</a>
    </div>
    <!--转发部分-->
    <div id="div_history">
        <div class="weui_cells_title">请将听课证转发给相应医生完成报名</div>

        @foreach($data as $index)
        <div class="weui_cell student_card">
            <div class="weui_cell_hd">
                <img src="/image/kzkt/classicon.png" alt="">
                <img src="/image/kzkt/classphoto.png" alt="">
            </div>
            <div class="weui_cell_bd">
                <a onclick="goViewCard({{$index['id']}})">
                    <span>点击查看详情</span>

                    <p>姓名：{{$index['name']}}</p>
                    <p>班级：{{$index['className']}}</p>
                    <p>手机号：{{$index['phone']}}</p>
                    <p>报名时间：{{$index['time']}}</p>
                </a>
                <a onclick="goViewCard({{$index['id']}})">
                    <span>点<br>击<br>转<br>发</span>
                </a>
            </div>
        </div>
        @endforeach
    </div>




    <!--编辑部分-->
    <div id="div_edit" style="display: none">
        <div class="weui_cells_title">请将听课证转发给相应医生完成报名</div>
        <div class="container student_sign">

            <div class="weui_cells">
                @foreach($undata as $index)
                <div class="weui_cell" style="padding:10px">
                    <div class="weui_cell_hd">
                        <p>{{$index['name']}}</p>
                    </div>
                    <div class="weui_cell_bd weui_cell_primary">
                        <p class="text_center">{{$index['className']}}</p>
                    </div>
                    <div class="weui_cell_ft">
                        <img src="/image/kzkt/edit.png" onclick="goEdit({{$index['id']}})" alt="">
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>

</div>

<!-- 代码部分end -->
</body>
</html>