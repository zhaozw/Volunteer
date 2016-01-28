<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的活动</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ecf0f1">

<div class="container">

    <div class="row">
        <img src="image/icons/kongkebanner.png" alt="banner" class="img-responsive">
    </div>

    @foreach($activities as $activity)
        <div class="col-xs-6" style="padding: 20px 0px 20px 0px;border: 1px solid #eeeeee";>
            <a href="{{$activity->index_url}}">
                <div style="text-align: center">
                    <img width="80px" src="{{$activity->icon_url}}">
                    <p style="display: inline-block;font-size: 16px;color: #333333;font-family: 'Microsoft YaHei', 'WenQuanYi Micro Hei', sans-serif;">
                        {{$activity->title}}
                    </p>
                </div>
            </a>
        </div>
    @endforeach

</div>

</body>
</html>