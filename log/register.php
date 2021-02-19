<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" href="CSS/color.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body class="register_body">

<!--导航栏-->
<script type="text/javascript">
    function checkusername()
    {
        var myform = document.getElementById("form1");
        var username = myform.user1.value.length;
        if(username < 6)
        {
            errusername.innerHTML = "<font color='red'>用户名符合要求</font>";
            return false;
        }else{
            errusername.innerHTML = "<font color='green'>用户名符合要求</font>";
            return true;
        }
    }

    function checkpassword()
    {
        var myform = document.getElementById("form1");
        var password = myform.password.value.length;
        if(password < 8)
        {
            errpassword.innerHTML = "<font color='red'>密码不符合要求</font>";
            return false;
        }else{
            errpassword.innerHTML = "<font color='green'>密码符合要求</font>";
            return true;
        }
    }
    function checkpasswordagain()
    {
        var myform = document.getElementById("form1");
        var repassword = myform.repassword.value;
        var password = myform.password.value;
        if(password!=repassword)
        {
            errrepassword.innerHTML = "<font color='red'>两次密码输入不一致</font>";
            return false;
        }
        else if(repassword.length==0){
            errrepassword.innerHTML = "<font color='red'>密码输入不合法</font>";
            return false;


        }else{
            errrepassword.innerHTML = "<font color='green'>密码符合要求</font>";
            return true;
        }
    }




    function checkqq()
    {
        var myform = document.getElementById("form1");
        var qq = myform.qq.value;
        if(qq != parseInt(qq))
        {
            errqq.innerHTML = "<font color='red'>qq不符合要求</font>";
            return false;
        }else{
            errqq.innerHTML = "<font color='green'>qq符合要求</font>";
            return true;
        }
    }

    function checkpin()
    {
        var myform = document.getElementById("form1");
        var safecode = myform.safecode.value;
        var safecodelength = myform.safecode.value.length;
        if(safecode!= parseInt(safecode))
        {
            errpin.innerHTML = "<font color='red'>pin不符合要求</font>";
            return false;
        }else{
            errpin.innerHTML = "<font color='green'>pin符合要求</font>";
            return true;
        }
    }


    function checkform()
    {
        checkusername();
        checkqq();
        checkpin();
        checkpasswordagain();
        checkpassword();

        if(checkusername()&&checkpassword()&&checkpasswordagain()&&checkpin()&&checkqq())
        {
            return true;
        }
        else{
        return false;
    }


    }
</script>
<form action="register_do.php" method="get" id="form1" onsubmit="return checkform()">
    <table class="login_register_table">
        <tr><td><strong><font size="3" color="white">用户名</font></strong></td><td>&nbsp;</td><td><input type="text" name="user1" id="user1" class="form-control" placeholder="6位以上" ></td><td><div id="errusername" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><strong><font size="3" color="white">密码</font></strong></td><td>&nbsp;</td><td><input type="password" name="password"  id="password" class="form-control" placeholder="8位以上"  ></td><td><div id="errpassword" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td width="80"><strong><font size="3" color="white">确认密码</font></strong></td><td>&nbsp;</td><td><input type="password" name="repassword"  id="repassword" class=form-control placeholder="重复你的密码" ></td><td><div id="errrepassword" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><strong><font size="3" color="white">QQ</font></strong></td><td>&nbsp;</td><td><input type="text" name="qq" class="form-control" id="qq" placeholder="你的QQ" ></td><td><div id="errqq" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><input type="submit" class="btn btn-primary" value="注册"></td><td>&nbsp;</td><td><input class="btn btn-default" type="reset" value="重置"></tr>
    </table>
</form>
</body>

</html>