<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/15
 * Time: 13:11
 */
header("Content-Type: text/html;charset=utf-8");
session_start();
require_once('../conn/conn.php');
//$ID=@ $_SESSION[ID];
if(@ $_SESSION['username']==''){
    echo "<script charset='gb2312' type='text/javascript' language='javascript'>alert('您还未登入');</script>";
    header("Refresh:2;url=login.php");
    exit;}
else {
    $username=$_SESSION['username'];
}
$lesson_id= $_SESSION["ID"];
$sql="select * from tb_user WHERE username='$username'";
$sql1="select * from lesson_p WHERE Id=$lesson_id";
$result=mysqli_query($conn,$sql);
$result1=mysqli_query($conn,$sql1);
$info=mysqli_fetch_array($result);
$info1=mysqli_fetch_array($result1);
if($info["mon"]==0&&$info1["mon"]==1){
    echo "<script  charset='gb2312' type='text/javascript' language='javascript'>alert('您还不是会员，此视频需要开通会员才能观看');</script>";
    header("Refresh:2;url=login.php");
    exit;
}
else{

    echo "<script  charset='gb2312' type='text/javascript' language='javascript'>alert('订阅成功，返回个人主页即可观看');</script>";
    header("Refresh:2;url=../user/user_interface.php");
    $sql2="insert into sub(username,lesson_id) VALUES ('$username',$lesson_id)  ";
    $result2=mysqli_query($conn,$sql2);
    $info2=mysqli_fetch_array($result2);
    exit;
}
