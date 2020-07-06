//使用jquery ajax

window.onload=function () {             //页面加载完成后
    var btn = document.getElementById("sub");//获取按钮元素
    btn.onclick = function () {
        if (document.getElementById("tis")) {
            document.getElementById("tis").remove();
        }
        var tis = document.createElement('div');    //创建元素
        tis.id = "tis";             //加id
        tis.role = "alert";
        tis.className = "alert alert-danger";
        document.getElementById('loginWindow').appendChild(tis);//把tis元素添加到‘loginWindow’后面
        tis.onclick = function () {
            tis.remove();       //移除元素
        }
        if ($("#user").val() == '') {
            tis.innerHTML = "请输入账号!";
            return false;
        }
        if ($("#pwd").val()  == '') {
            tis.innerHTML = "请输入密码！";
            return false;
        }
        if ($("#verificationCode").val() == '') {
            tis.innerHTML = "请输入验证码!";
            return false;
        }
        var name=$("#user").val();
        var pwd=$("#pwd").val();
        var verificationCode = $("#verificationCode").val();
        $.ajax({
                type: "post",
                url: "check.php",
                dataType:"text",
                data: {"user": name, "pwd": pwd, "verificationCode": verificationCode},
                error: function () {
                    alert("请求访问失败！");
                },
                success: function (res) {
                    if (res == 1) {
                        tis.innerHTML = "验证码输入错误!请重新输入!";
                        document.getElementById("myform").reset();
                        return false;
                    }
                    if (res == 0) {
                        tis.innerHTML = "密码或账号错误！";
                        document.getElementById("myform").reset();
                        return false;
                    }
                    if (res == 200) {
                        tis.className = "alert alert-success";
                        tis.innerHTML = "登陆成功！正在跳转....";
                        window.location.href = "index.html";
                    } else {
                        tis.innerHTML = "发现未知错误！";
                    }
                }
            }
        )
    }
}