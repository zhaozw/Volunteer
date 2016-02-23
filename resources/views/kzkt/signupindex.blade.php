<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>空中课堂报名</title>
    <link rel="stylesheet" href="/css/medtech.css">

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
//                    if (json.result == '-1') {
//                        $('#link_sign').hide();
//                        $('#link_view').hide();
//                        $('#text_view').val('-1');
//                    }
//
//                    if (json.result == '1') {
//                        $('#link_sign').show();
//                        $('#link_view').show();
//                        $('#text_view').val('1');
//                    }
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
<div class="row" id="airclass">
    <div class=" large-4 large-centered columns">
        <div>
            <h4 class="text-center">课程简介</h4>
            <h6 class="text-left">全科医学协作平台远程教育项目-2016空中课堂内分泌代谢基础班、高级版、精品班由蓝海联盟（北京）医学研究院主办，由内分泌代谢专家结合基层常见的内分泌疾病诊疗误区和难点、设置的远程教育课程。</h6>
        </div>
        <div>
            <div class="bm_sj">
                <p>
                    <span class="baoming">报名时间</span> <span class="time">2016年3月---2016年4月</span>
                </p>
                <p>
                    <span class="baoming">开课时间</span> <span class="time">2016年5月---2016年11月</span>
                </p>
            </div>
        </div>
        <hr>

        <div>
            <p class="baoming">班级详情</p>
            <p class="bj" onclick="goDetail2();">
                <span class="banji">内分泌代谢疾病基础班</span><br>
                <span class="xiangqing">课程内容设计糖尿病的基础治疗手段和防治诊疗方面的基础内容。</span>
                <a><img src="/image/airclass/u42.png" onclick="goDetail1();"></a>
            </p>

            <hr>
            <p class="bj" onclick="goDetail2();">
                <span class="banji">内分泌代谢疾病高级班</span><br>
                <span class="xiangqing">课程内容围绕糖尿病并发症预防和治疗、以及降糖药的选择与延展等。</span>
                <a><img src="/image/airclass/u42.png" onclick="goDetail2();"></a>
            </p>
            <hr>
            <p class="bj" onclick="goDetail3();">
                <span class="banji">内分泌代谢疾病精品班</span><br>
                <span class="xiangqing">课程以病例分享以及课题研究的形式对内分泌常见疾病的讨论，病例谈论分析。</span>
                <a><img src="/image/airclass/u42.png" onclick="goDetail3();"></a>
            </p>
            <hr>
        </div>
        <div>
            <a id="link_show" href="/kzkt/showflow" class="button expanded">报名方式</a>
            <a id="link_sign" href="/kzkt/signup" class="button expanded" style="display: none">2016空中课堂报名</a>
            <a id="link_view" href="/kzkt/findAllRegister" class="button expanded" style="display: none">查看历史报名记录</a>
            <input type="hidden" id="text_view" value="-1">
        </div>
    </div>

</div>

</body>
</html>