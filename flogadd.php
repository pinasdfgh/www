
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./libs/css/bootstrap.min.css" rel="stylesheet">
    <!--    <link rel="stylesheet" href="./libs/css/jquery.toast.css">-->
    <style>
        #login{
            border : 5px solid #dff0d8;
            position : relative;
            background-color: white;
            width: 600px;
            height : 400px;
            padding-top: 0px;
        }
        #log{
            /*background-color: #bbbbbb;*/
            text-align: center;
        }
        body{
            background-color: #f3f3f3;
            font-family: Arial,Times New Roman,serif;
            font-size: medium;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <a href="fLogin.php"><button type="button" class="btn btn-default navbar-btn"
                                 style="float: right; margin: 10px">Sign in</button></a>
    <a href="addMemberV2.php"><button type="button" class="btn btn-default navbar-btn"
                                      style="float: right; margin: 10px">Sign up</button></a>
</nav>

<div id='login' class="container-fluid">
    <!-- HTML 內容放這邊 -->
    <div id="log" class="alert alert-success" role="alert">
        <h1>Sign up</h1>
    </div>
    <form class="form-horizontal"
          method="get" action="faddmember.php">
        <div class="form-group">
            <label for="userNameTextBox"
                   class="control-label col-sm-4">
                <span class="glyphicon glyphicon-user"></span>
                輸入帳號
            </label>
            <div class="col-sm-8">
                <input type="text"
                       id="userNameTextBox" name="account"
                       class="form-control"
                       placeholder="新增帳號或E-mail" />
            </div>
        </div>

        <div class="form-group">
            <label for="passwordTextBox"
                   class="control-label col-sm-4">
                <span class="glyphicon glyphicon-lock"></span>
                輸入密碼
            </label>
            <div class="col-sm-8">
                <input type="password"
                       id="passwordTextBox"
                       class="form-control"
                       placeholder="請在此輸入密碼">
            </div>
        </div>

        <div class="form-group">
            <label for="passwordTextBox"
                   class="control-label col-sm-4">
                <span class="glyphicon glyphicon-lock"></span>
                確認密碼
            </label>
            <div class="col-sm-8">
                <input type="password"
                       id="passwordTextBox" name="passwd"
                       class="form-control"
                       placeholder="請在此輸入密碼">
            </div>
        </div>

        <div class="form-group">
            <label for="userNameTextBox"
                   class="control-label col-sm-4">
                <span class="glyphicon glyphicon-user"></span>
                輸入姓名
            </label>
            <div class="col-sm-8">
                <input type="text"
                       id="userNameTextBox" name="userName"
                       class="form-control"
                       placeholder="輸入姓名" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit"  value="login"
                        id="loginButton"
                        class="btn btn-success">
                    <span class="glyphicon glyphicon-off"></span> 新增
                </button>
                <button type="submit" value="cancel"
                        id="cancelButton"
                        class="btn btn-default">
                    <span class="glyphicon glyphicon-remove"></span> 取消
                </button>
            </div>
        </div>
    </form>
</div>
<!--目前視窗寬度：<span id="w"></span><br>-->
<!--目前視窗高度：<span id="h"></span>-->

<script src="./libs/js/jquery.js"></script>
<script src="./libs/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="./libs/js/jquery.toast.js"></script>-->

<script>

    // init.
    $(function () {
        wdth=$(window).width();
        hegh=$(window).height();
        $("#login").css({'position':'relative','top':(hegh/2-300)+'px'});
        $(window).resize(function() {
            wdth=$(window).width();
            $("#w").text(wdth);
            hegh=$(window).height();
            $("#h").text(hegh);
            $("#login").css({'position':'relative','top':(hegh/2-300)+'px'})
        });
    })  // end of init.
</script>

</body>
</html>