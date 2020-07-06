<?php
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用户登陆</title>
    <script src="../jquery-3.4.1/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="login2.js";></script>
    <style>
        #loginWindow{       /*窗口页面上下左右居中*/
            position: absolute;
            top: 50%;
            height: 240px;
            margin-top: -120px;
            width: 500px;
            left:50%;
            margin-left: -250px;
        }
    </style>
</head>
<body>
<div class="page-header" style="margin: 0">
    <h1>学生教务管理系统 <small>用户登陆</small></h1>
</div>
<form id="myform">
    <div id="loginWindow" >
    <div class="form-group">
        <label for="user">账号</label>
        <input type="text" class="form-control" id="user" placeholder="User">
    </div>
    <div class="form-group">
        <label for="pwd">密码</label>
        <input type="password" class="form-control" id="pwd" placeholder="Password">
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="verificationCode">验证码</label>
                <input type="text" class="form-control" id="verificationCode" >
            </div>
        </div>
        <div class="col-md-6">
            <img src="verificationCode.php" alt="验证码加载出错！" width="100px" height="30px" id="vcimg">
            <script>
                vcimg.onclick=function () {
                    document.getElementById("vcimg").src="verificationCode.php?"+new Date();
                }
            </script>
        </div>
    </div>
    <button type="button" class="btn btn-default" id="sub">登陆</button>
    </div>
</form>
</body>
</html>