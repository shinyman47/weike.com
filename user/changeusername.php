<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/21
 * Time: 19:43
 */
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
session_start();
$name=$_SESSION['username'];
$username=$_GET['name'];
$id=$_SESSION['ID'];

$sql1 = "select * from tb_user where username='$username'";
$check = mysqli_query($conn, $sql1);
$info1 = mysqli_fetch_array($check);
if ($info1==true) {
    echo "<script charset='gb2312' type='text/javascript'>alert('用户名已存在，请重新写');location='javascript:history.back()';</script>";
}
else {
    $sql = "update tb_user  set  username='$username' WHERE ID='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result != false) {
        echo "用户名修改成功";
        header("Refresh:2;url=user_interface.php");
        $_SESSION['username'] = $username;
        exit();
    } else {
        echo "用户名修改失败";
        header("Refresh:2;url=user_interface.php");


    }
}


