<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/28
 * Time: 19:20
 */
header("Content-Type: text/html;charset=utf-8");
session_start();
include_once ("../conn/conn.php");
$lesson_id=$_GET['lesson_id'];
$sql="select * from timu WHERE lesson_id=$lesson_id";
$result=mysqli_query($conn,$sql);
$count=0;
$flag=0;
while ($info=mysqli_fetch_array($result)){
    $count=$count+1;
    if($info['aws']!=$_GET['option'.$count]){
        echo "第".$count."题错了";
        $flag++;


    }

}
if($flag==0){
    echo "你好强大，一题没错";
    header("Refresh:2;url=courseply_interface.php?lesson_id=$lesson_id");
}
else{
    echo "一共错了".$flag."题，两秒后返回";
    header("Refresh:2;url=courseply_interface.php?lesson_id=$lesson_id");
}
