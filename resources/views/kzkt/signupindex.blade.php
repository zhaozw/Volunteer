<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>空中课堂报名</title>
    <link rel="stylesheet" href="/css/kzkt.css">
    <link rel="stylesheet" href="/css/weui.css">

    <!-- 引入 jQuery 库 -->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>

    <script type="application/javascript">
        function goDetail1() {
            var id = document.getElementById('text_view').value;
            window.location.href = '/kzkt/classdetail1?id='+id;
        }

        function goDetail2() {
            var id = document.getElementById('text_view').value;
            window.location.href = '/kzkt/classdetail2?id='+id;
        }

        function goDetail3() {
            var id = document.getElementById('text_view').value;
            window.location.href = '/kzkt/classdetail3?id='+id;
        }

        $(document).ready(function() {
            var requestUrl = '/kzkt/checkuser';
            $.ajax({
                type: "get",
                dataType: "json",
                url: requestUrl,
                success: function (json) {
                    if (json.result == '-1') {
                        $('#link_sign').hide();
                        $('#link_view').hide();
                        $('#text_view').val('-1');
                    }

                    if (json.result == '1') {
                        $('#link_sign').show();
                        $('#link_view').show();
                        $('#text_view').val('1');
                    }
                },
                error: function (xhr, status, errorThrown) {
                    alert("Sorry, there was a problem!");
                },
                complete: function (xhr, status) {
//                    alert("The request is complete!");
                }
            });
        });

    </script>

</head>
<body>
<div class="class_bg">
    <h3 class="text-center">课程简介</h3>
    <p>全科医学协作平台远程教育项目-2016空中课堂内分泌代谢基础班、高级版、精品班由蓝海联盟（北京）医学研究院主办，由内分泌代谢专家结合基层常见的内分泌疾病诊疗误区和难点，设置的远程教育课程。</p>
</div>
<hr class="line">
<div class="bm_time">
    <h4>报名时间
        <small>丨 2016年3月---2016年4月</small>
    </h4>
    <h4>开课时间
        <small>丨 2016年5月---2016年11月</small>
    </h4>
    <h4>直播时间
        <small>丨 16：00---16：40</small>
    </h4>
</div>
<hr class="line">
<div class="grids">
    <a href="javascript:;" class="grid" onclick="goDetail1();">
        <div class="grid_icon">
            <img src="/image/airclass/u36.png" alt="" class="img">
        </div>
        <p class="grid_label">
            基础班
        </p>
    </a>
    <a href="javascript:;" class="grid" onclick="goDetail2();">
        <div class="grid_icon">
            <img src="/image/airclass/u38.png" alt="" class="img">
        </div>
        <p class="grid_label">
            高级班
        </p>
    </a>
    <a href="javascript:;" class="grid" onclick="goDetail3();">
        <div class="grid_icon">
            <img src="/image/airclass/u40.png" alt="" class="img">
        </div>
        <p class="grid_label">
            精品班
        </p>
    </a>

</div>
<hr class="line">
<div class="btn_bj">
    <a id="link_show" href="/kzkt/showflow" class="btn">报名指南</a>
    <a id="link_sign" href="/kzkt/signup" class="btn">报名入口</a>
    <a id="link_view" href="/kzkt/findAllRegister" class="btn">报名记录</a>
    <input type="hidden" id="text_view" value="-1">
</div>
</body>
</html>