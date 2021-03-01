<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/21
 * Time: 19:20
 */
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
$name=$_GET['user'];
$ques=$_GET['ques'];
$answ=$_GET['answ'];
$pwd=$_GET['password'];
$sql="select * from tb_user WHERE username='$name'";
$result=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($result);

if($info["que"]!=$ques||$info['aws']!=$answ) {
    echo "密保问题错误，两秒后返回登入页面";
    header("Refresh:2;url=login.php");
    exit();
}
else{
    $sql="update tb_user  set  pwd='$pwd' WHERE username='$name'";
    $result=mysqli_query($conn,$sql);
    echo "密码修改成功";
    header("Refresh:2;url=login.php");
    exit();


}


