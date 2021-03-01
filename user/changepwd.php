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
$id=$_SESSION['ID'];
$pwd=$_GET['pwd'];


$sql="update tb_user  set  pwd='$pwd' WHERE ID='$id'";
$result=mysqli_query($conn,$sql);
if($result!=false){
    echo "密码修改成功";
    header("Refresh:2;url=user_interface.php");
    exit();
}
else{
    echo "密码修改失败";
    header("Refresh:2;url=user_interface.php");


}


