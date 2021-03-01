<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/28
 * Time: 18:13
 */
header("Content-Type: text/html;charset=utf-8");
include_once("../../conn/conn.php");
$id=$_GET['id'];
$sql="update mark set ys=1  WHERE Id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    echo "审核通过";

    header("Refresh:2;url=../commit.php");

}else{
    echo "审核失败";
    echo mysqli_error($conn);
    header("Refresh:2;url=../commit.php");

}
