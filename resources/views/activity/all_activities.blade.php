<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>我的活动</title>

    <link rel="stylesheet" href="http://cdn.bootcss.com/Swiper/3.2.0/css/swiper.min.css">
    <link href="//cdn.bootcss.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="img-responsive" src="/image/icons/kongkebanner.png">
        </div>
        <div class="swiper-slide">
            <img class="img-responsive" src="/image/huangpu_ad3.jpg">
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<div class="container">
    @foreach($activities as $activity)
        <div class="col-xs-6" style="padding: 20px 0px 20px 0px;border: 1px solid #eeeeee";>
            <a href="{{$activity->index_url}}">
                <div style="text-align: center">
                    <img width="80px" src="{{$activity->icon_url}}">
                    <p style="display: inline-block; width:64px;font-size: 16px;color: #333333;font-family: 'Microsoft YaHei', 'WenQuanYi Micro Hei', sans-serif;">
                        {{$activity->title}}
                    </p>
                </div>
            </a>
        </div>
    @endforeach

</div>

<script src="https://cdn.bootcss.com/Swiper/3.2.0/js/swiper.min.js"></script>
<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        slidesPerView: 1,
        paginationClickable: true,
        loop: true,
        visiblilityFullfit: true,
        autoplay: 5000
    });
</script>
</body>
</html>