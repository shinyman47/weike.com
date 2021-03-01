<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>找回密码</title>
    <link rel="stylesheet" href="CSS/color.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body class="login_body">

<!--导航栏-->
<form action="find_do.php" method="get">
    <table class="login_register_table">
        <tr><td><strong><font size="3" color="white">用户名</font></strong></td><td>&nbsp;</td><td><input type="text" name="user" class="form-control" placeholder="您的用户名"></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><strong><font size="3" color="white">密保问题</font></strong></td><td>&nbsp;</td><td><input type="" list="option" name="ques" class="form-control" id="ques" placeholder="您的密保问题" ></td></tr>
        <datalist id="option">
            <option value="我的母亲名字">
            <option value="我的父亲名字">
            <option value="我的生日">
            <option value="我出生的城市">
        </datalist>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td><strong><font size="3" color="white">密保答案</font></strong></td><td>&nbsp;</td><td><input type="answ" name="answ" class="form-control" placeholder="您的密保答案"></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><strong><font size="3" color="white">新密码</font></strong></td><td>&nbsp;</td><td><input type="password" name="password"  id="password" class="form-control" placeholder="8位以上"  ></td><td><div id="errpassword" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td width="80"><strong><font size="3" color="white">确认密码</font></strong></td><td>&nbsp;</td><td><input type="password" name="repassword"  id="repassword" class=form-control placeholder="重复你的密码" ></td><td><div id="errrepassword" align="center"></div></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
		<tr><td><input type="submit" class="btn btn-primary" value="修改密码" /></td><td>&nbsp;</td><td>&nbsp;</td></tr>
    </table>
</form>
</body>
</html>