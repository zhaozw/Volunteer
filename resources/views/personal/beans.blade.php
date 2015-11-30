<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/css/project_menu.css">

</head>


<body>

<div class="row userInfo">
    <div class="media-left media-middle">
        <a href="#">
            <img class="userImage" src="/image/pic01.jpg" alt="...">
        </a>
    </div>
    <div class="media-body">
        <h4 class="media-heading userName" >{{$volunteer->name}}</h4>
        <p class="userNum">{{$volunteer->phone}}</p>
        <p class="userCop">{{$volunteer->unit->full_name}}</p>
    </div>
    <div class="media-right media-middle text-primary">
        <h2 style="width: 150%">320<small style="font-size: 40%;padding-left:5px">迈豆</small></h2>
    </div>
</div>

<div class="container conPrj">



    <?php $i=0?>
    @foreach($volunteer->volunteerBeans->sortByDesc('valid_time') as $bean)
        <div class="row project-{{++$i}}">
            <div class="col-xs-12 " style="position: relative">
                <div class="col-xs-4 projPoint" style="padding-left: 5px;">
                    <h2>50<small style="font-size: 40%;padding-left:5px">迈豆</small></h2>
                </div>
                <div class="col-xs-8 projDetil">
                    <p class="">{{$bean->activityBeanRate->activity_name}}</p>
                    <p class="">{{$bean->activityBeanRate->action}}</p>
                    <p class="date">{{$bean->valid_time->format('Y-m-d H:i')}}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>


<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>