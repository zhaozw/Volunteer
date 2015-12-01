<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/user_point.css">

</head>


<body>


<div class="container conPrj">

    <div class="row userBlock">
        <div class="col-xs-3 userPic">
            <a href="#">
                <img class="userImage" src="/image/pic01.jpg" alt="...">
            </a>
        </div>
        <div class="col-xs-6 userInfo">
            <h4 class="userName">{{$volunteer->name}}</h4>

            <p class="userNum">{{$volunteer->phone}}</p>

            <p class="userCop">{{$volunteer->unit->full_name}}</p>
        </div>
        <div class="col userPoint">
            <p style="white-space: normal">
                320
                <small class="md">迈豆</small>
            </p>
        </div>
    </div>

    @foreach($volunteer->volunteerBeans->sortByDesc('valid_time') as $bean)
        <div class="row project-x">
            <div class="col-xs-4 projPoint">
                <p>50
                    <small class="md">迈豆</small>
                </p>
            </div>
            <div class="col projDetil">
                <h5 class=""><span>项目：</span>{{$bean->activityBeanRate->activity_name}}</h5>
                <h5 class=""><span>操作：</span>{{$bean->activityBeanRate->action_chs}}</h5>

                <p class="date">{{$bean->valid_time->format('m-d')}}</p>
            </div>
        </div>
    @endforeach

</div>

<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>