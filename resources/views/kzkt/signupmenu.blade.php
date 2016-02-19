<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>完成报名</title>

    <link rel="stylesheet" href="/css/volunteer.css">
    <link rel="stylesheet" href="/css/weui.min.css">

    <script type="application/javascript">
        function goViewCard(id) {
            window.location.href = '/kzkt/viewCard?id='+id;
        }

        function goEdit(id) {
            window.location.href = '/kzkt/editClassroom?id='+id;
        }

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
<div class="wrap">
    <div class="tabs">
        <a href="#" hidefocus="true" class="active">报名成功学员</a>
        <a href="#" hidefocus="true">报名未成功学员</a>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="content-slide">
                    <form action="" method="post">

                        <div class="weui_cells_title">请将听课证转发给相应医生完成报名</div>

                        <div class="">

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
                                        <a href="">
                                            <span>点<br>击<br>转<br>发</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>


                    </form>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="content-slide">
                    <div class="weui_cells_title">请将信息完善给相应医生完成报名</div>
                    <div class="container student_sign">
                        <div class="weui_cells">

                            @foreach($undata as $index)
                                <div class="weui_cell">
                                    <div class="weui_cell_hd">
                                        <p>{{$index['name']}}</p>
                                    </div>
                                    <div class="weui_cell_bd weui_cell_primary">
                                        <p class="text_center">{{$index['className']}}</p>
                                    </div>
                                    <div class="weui_cell_ft">
                                        <img src="/image/kzkt/edit.png" alt="编辑" onclick="goEdit({{$index['id']}})">
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://www.lanrenzhijia.com/ajaxjs/jquery-1.10.1.min.js"></script>
<script src="http://www.lanrenzhijia.com/ajaxjs/idangerous.swiper.min.js"></script>
<script>
    var tabsSwiper = new Swiper('.swiper-container', {
        speed: 500,
        onSlideChangeStart: function () {
            $(".tabs .active").removeClass('active');
            $(".tabs a").eq(tabsSwiper.activeIndex).addClass('active');
        }
    });

    $(".tabs a").on('touchstart mousedown', function (e) {
        e.preventDefault()
        $(".tabs .active").removeClass('active');
        $(this).addClass('active');
        tabsSwiper.swipeTo($(this).index());
    });

    $(".tabs a").click(function (e) {
        e.preventDefault();
    });
</script>
<!-- 代码部分end -->
</body>
</html>