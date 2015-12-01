<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
    <title>Id Card</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/id_card.css">
</head>


<body>
<div class="container">
    <div class="row header ">
        <img class="userPic" src="/image/pic01.jpg" alt="">
    </div>
    <div class="row footer">
        <div class="user-info">
            <hr>
            <h4>
                <small>电话</small>
                {{$volunteer->phone}}
            </h4>
            <hr>
            <h4>
                <small>邮箱</small>
                {{$volunteer->email}}
            </h4>
            <hr>
            <h4>
                <small>公司</small>
                {{$volunteer->unit->full_name}}
            </h4>
            <hr>
            <button class="btn btn-warning" style="float: right">修改个人信息</button>
        </div>
    </div>
</div>
</body>
</html>