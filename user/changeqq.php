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
$qq=$_GET['qq'];
$id=$_SESSION['ID'];
$sql="update tb_user  set  qq='$qq' WHERE  ID='$id'";
$result=mysqli_query($conn,$sql);
if($result!=false){
    echo "qq修改成功";
    header("Refresh:2;url=user_interface.php");
    exit();
}
else{
        echo "qq修改失败";
        header("Refresh:2;url=user_interface.php");


    }



