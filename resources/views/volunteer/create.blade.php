<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/flat-ui/2.2.2/css/flat-ui.css">
    <link rel="stylesheet" href="/css/sign_up.css">
</head>

<body class="sign-body">
<div class="container-fluid">
    <div class="row" id="login-div">
        <form class="form-horizontal" id="login-from" action="{{url('/volunteer')}}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>错误！</strong> 请检查您的输入。<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">

                <div class="div-position">
                    <input type="text" class="form-control" name="name" id="inputUser" value="{{old('name')}}" placeholder="用户名" required>
                    <label for="inputEmail3" class="pos login-field-icon"><span class=" glyphicon glyphicon-user"></span> </label>
                </div>

                <div class="div-position">
                    <input type="text" class="form-control" name="phone" id="inputPhone" value="{{old('phone')}}" placeholder="手机号" required>
                    <label for="inputPassword3" class="pos login-field-icon"><span class=" glyphicon glyphicon-phone"></span></label>
                </div>

                <div class="div-position">
                    <input type="email" class="form-control" name="email" id="inputEmail" value="{{old('email')}}" placeholder="邮箱" required>
                    <label for="inputPassword3" class="pos login-field-icon"><span
                                class=" glyphicon glyphicon-envelope"></span></label>
                </div>

                <div class="div-position">
                    <div class="dropdown clearfix">
                        <button id="drop1" class="btn btn-block dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-haspopup="false" aria-expanded="false">
                            <span>请选择公司</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu cop-list" aria-labelledby="drop1">
                            @foreach($units as $unit)
                                <li><a class="unit_data" id="unit_{{$unit->id}}" href="#">{{$unit->full_name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="div-position hidden">
                    <input type="text" class="form-control" name="unit_id" id="inputUnit" placeholder="公司" required>
                    <label for="inputPassword3" class="pos login-field-icon"><span
                                class="glyphicon glyphicon-envelope"></span></label>
                </div>
            </div>
            <div class="form-group">
                <button href="#" class="btn btn-block btn-success btn-lg active" role="button" id="login-btn">注&nbsp;&nbsp;册
                </button>
            </div>
        </form>

    </div>
</div>


<script src="https://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(".unit_data").click(function () {
            li_index = $(this).parent().index();
            ul = $(this).parent().parent();
            a = ul.children().eq(li_index).children().eq(0);
            content = a.text();
            $("#inputUnit").val(a.attr('id').substr(5));
            $("#drop1").children().eq(0).text(content);
        });
    })
</script>

</body>
</html>