<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/20
 * Time: 16:37
 */
include_once ("../conn/conn.php");
$class=$_GET['class'];
$sql=mysqli_query($conn,"select * from class where typename='".$class."'");
$info=mysqli_fetch_array($sql);
if($info!=false){
    echo"<script>alert('该类别已经存在!');window.location.href='tag.php';</script>";
    exit;
}
mysqli_query($conn,"insert into class(typename) values ('$class')");
echo"<script>alert('新类别添加成功!');window.location.href='tag.php';</script>";
?>