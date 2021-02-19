<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="CSS/color.css">
    <link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>
<body class="login_body">

<!--导航栏-->
<form action="login_do.php" method="get">
    <table class="login_register_table">
        <tr><td><strong><font size="3" color="white">用户名</font></strong></td><td>&nbsp;</td><td><input type="text" name="user" class="form-control"></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><strong><font size="3" color="white">密码</font></strong></td><td>&nbsp;</td><td><input type="password" name="password" class="form-control"></td></tr>
        <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr><td><input type="submit" class="btn btn-primary" value="登录" /></td><td>&nbsp;</td><td><a href="register.php">注册</a></td><td>&nbsp;</td><td><a href="find_password.php">忘记密码？</a></td></tr>
    </table>
</form>
</body>
</html>