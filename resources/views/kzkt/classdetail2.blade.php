<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2016内分泌代谢疾病 高级班课程表</title>

    <style type="text/css">
        body{
            background-color: #e8e8e8;
            font-family: "SimHei", "Microsoft YaHei", "WenQuanYi Micro Hei", sans-serif;
        }
        #customers
        {

            width:100%;
            border-collapse:collapse;
        }

        #customers td, #customers th
        {
            font-size: 13px;
            height: 55px;
            /* border: 1px solid #98bf21; */
            /* padding: 59px 26px 11px 0px; */
        }

        #customers th
        {
            font-size: 15px;
            padding-top: 5px;
            padding-bottom: 4px;
            background-color: #1F1F1E;
            color: #ffffff;
        }

        #customers tr.alt td
        {
            color:#000000;
            background-color:#A3A59F;
        }

        .button.expanded {
            margin-top: 15px;
            display: block;
            margin-left: 0;
            margin-right: 0;
        }
        .button {
            text-align: center;
            display: inline-block;
            cursor: pointer;
            -webkit-appearance: none;
            transition: background-color .25s ease-out,color .25s ease-out;
            border: 1px solid transparent;
            border-radius: 0;
            padding: .85em 1em;
            margin: 0 0 1rem;
            font-size: .9rem;
            background-color: #2199e8;
            color: #fff;
        }

    </style>
    <!-- 引入 jQuery 库 -->
    <script src="//cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script type="application/javascript">
        function goSignUp() {
            window.location.href = '/kzkt/signup';
        }

        var request = function (paras) {
            var url = location.href;
            var paraString = url.substring(url.indexOf("?") + 1, url.length).split("&");
            var paraObj = {}
            for (i = 0; j = paraString[i]; i++) {
                paraObj[j.substring(0, j.indexOf("=")).
                        toLowerCase()] = j
                        .substring(j.indexOf("=") + 1, j.length);

            }
            var returnValue = paraObj[paras.toLowerCase()];
            if (typeof(returnValue) == "undefined") {
                return "";
            } else {
                return returnValue;
            }
        }

        $(document).ready(function () {

            var result = request('id');

            if (result == '-1') {
                $('#p_view').hide();
            }
            else {
                $('#p_view').show();
            }

        });

    </script>
</head>

<body>
<div class=" large-4 large-centered columns">
    <table id="customers">
        <tr>
            <th style="width: 25%">日期</th>
            <th style="width: 15%">星期</th>
            <th style="width: 35%">课程题目</th>
            <th style="width: 25%">授课专家</th>

        </tr>

        <tr>
            <td>2016/05/10</td>
            <td>周二</td>
            <td>胰岛素的治疗</td>
            <td>杨文英教授</td>
        </tr>

        <tr class="alt">
            <td>2016/05/24</td>
            <td>周二</td>
            <td>口服降糖药的选择和延展</td>
            <td>杨文英教授</td>
        </tr>

        <tr>
            <td>2016/06/14</td>
            <td>周二</td>
            <td>糖尿病的自我血糖监测</td>
            <td>杨文英教授</td>
        </tr>

        <tr class="alt">
            <td>2016/06/28</td>
            <td>周二</td>
            <td>胰岛素泵的使用规范</td>
            <td>杨文英教授</td>
        </tr>

        <tr>
            <td>2016/07/12</td>
            <td>周二</td>
            <td>糖尿病急性并发症的诊断与治疗</td>
            <td>杨文英教授</td>
        </tr>

        <tr class="alt">
            <td>2016/07/26</td>
            <td>周二</td>
            <td>糖尿病的大血管病变</td>
            <td>杨文英教授</td>
        </tr>

        <tr>
            <td>2016/08/09</td>
            <td>周二</td>
            <td>糖尿病肾病</td>
            <td>许樟荣教授</td>
        </tr>

        <tr class="alt">
            <td>2016/08/23</td>
            <td>周二</td>
            <td>糖尿病足病</td>
            <td>许樟荣教授</td>
        </tr>

        <tr>
            <td>2016/09/13</td>
            <td>周二</td>
            <td>糖尿病神经病变</td>
            <td>许樟荣教授</td>
        </tr>

        <tr class="alt">
            <td>2016/09/27</td>
            <td>周二</td>
            <td>糖尿病的综合管理</td>
            <td>许樟荣教授</td>
        </tr>
        <tr>
            <td>2016/10/11</td>
            <td>周二</td>
            <td>妊娠糖尿病的筛查与管理</td>
            <td>许樟荣教授</td>
        </tr>

        <tr class="alt">
            <td>2016/10/25</td>
            <td>周二</td>
            <td>老年糖尿病</td>
            <td>许樟荣教授</td>
        </tr>
    </table>
    <p id="p_view" class="button expanded" onclick="goSignUp();">2016空中课堂报名</p>
    </div>
</body>
</html>