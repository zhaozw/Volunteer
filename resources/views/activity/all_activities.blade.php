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
    @foreach($activities as $activity)
        <div class="col-xs-4" style="margin: 30px auto;">
            <a href="{{$activity->index_url}}">
                <div>
                    <img class="img-responsive" src="{{$activity->icon_url}}">
                </div>
                <p style="text-align: center; margin-top: 10px;">{{$activity->title}}</p>
            </a>
        </div>
    @endforeach
</div>
</body>
</html>