<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">

    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/flat-ui/2.2.2/css/flat-ui.css">
    <link rel="stylesheet" href="css/sign_up.css">
</head>

<body class="sign-body">
<div class="container-fluid">
    <div class="row" id="login-div">
        <form class="form-horizontal" id="login-from">

            <div class="form-group">

                <div class="div-position">
                    <input type="text" class="form-control " id="inputUser" placeholder="用户名">
                    <label for="inputEmail3" class="pos login-field-icon"><span class=" glyphicon glyphicon-user"></span> </label>
                </div>

                <div class="div-position">
                    <input type="number" class="form-control" id="inputPhone" placeholder="手机号">
                    <label for="inputPassword3" class="pos login-field-icon"><span class=" glyphicon glyphicon-phone"></span></label>
                </div>

                <div class="div-position">
                    <input type="email" class="form-control" id="inputEmail" placeholder="邮箱">
                    <label for="inputPassword3" class="pos login-field-icon"><span
                                class=" glyphicon glyphicon-envelope"></span></label>
                </div>

                <div class="div-position">
                    <div class="dropdown clearfix open">
                        <button class="btn btn-block dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Dropdown
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu cop-list" aria-labelledby="dropdownMenu1" >
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                        </ul>
                    </div>
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
<script src="https://cdn.bootcss.com/flat-ui/2.2.2/js/flat-ui.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>