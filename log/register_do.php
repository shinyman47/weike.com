<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/1/31
 * Time: 14:53
 */
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
$user=$_GET["user1"];
$password=$_GET['password'];
$qq=$_GET['qq'];
$que=$_GET['ques'];
$aws=$_GET['quesan'];
$sql1 = "select * from tb_user where username='$user'";
$check = mysqli_query($conn, $sql1);
$info1 = mysqli_fetch_array($check);
if ($info1==true) {
    echo "<script charset='gb2312' type='text/javascript'>alert('用户名已存在，请重新写');location='javascript:history.back()';</script>";
}
else {
    $sql1 = "insert into tb_user(username,pwd,qq,que,aws) values('$user','$password','$qq','$que','$aws')";
    $result = $conn->query($sql1);
    if ($result) {
        echo "添加成功,2秒后返回登入界面";
        header("Refresh:2;url=login.php");
    } else {
        echo "注册失败,2秒后返回注册界面";
        header("Refresh:2;url=register.php");
    }

}