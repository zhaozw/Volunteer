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
    </form>
</div>

</body>
</html>