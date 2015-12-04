<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>修改资料</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/flat-ui/2.2.2/css/flat-ui.css">


    <link rel="stylesheet" href="/css/id_card_edit.css">

</head>

<body class="sign-body">
<div class="container-fluid">
    <div class="row" id="login-div">
        <form class="form-horizontal" id="login-from">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="div-position">
                    <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="请输入新的手机号"
                           value="{{$volunteer->phone}}" required>
                    <label for="inputPhone" class="pos login-field-icon"><span
                                class=" glyphicon glyphicon-phone"></span></label>
                </div>

                <div class="div-position">
                    <input name="email" type="email" class="form-control" id="inputEmail" placeholder="请输入新的邮箱"
                           value="{{$volunteer->email}}" required>
                    <label for="inputEmail" class="pos login-field-icon"><span
                                class=" glyphicon glyphicon-envelope"></span></label>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" href="#" class="btn btn-block btn-success btn-lg active" role="button"
                        id="login-btn">确认修改
                </button>
            </div>
        </form>

    </div>
</div>


<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/flat-ui/2.2.2/js/flat-ui.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>