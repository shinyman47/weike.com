<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/28
 * Time: 17:15
 */
header("Content-Type: text/html;charset=utf-8");
include_once("../conn/conn.php");
$lesson=$_GET['lesson_id'];

$tm1=$_GET['tma'];
$tm2=$_GET['tmb'];
$tm3=$_GET['tmc'];
$tm4=$_GET['tmd'];
$tm5=$_GET['tme'];
$a1=$_GET['aa'];
$a2=$_GET['ab'];
$a3=$_GET['ac'];
$a4=$_GET['ad'];
$b1=$_GET['ba'];
$b2=$_GET['bb'];
$b3=$_GET['bc'];
$b4=$_GET['bd'];
$c1=$_GET['ca'];
$c2=$_GET['cb'];
$c3=$_GET['cc'];
$c4=$_GET['cd'];
$d1=$_GET['da'];
$d2=$_GET['db'];
$d3=$_GET['dc'];
$d4=$_GET['dd'];
$e1=$_GET['ea'];
$e2=$_GET['eb'];
$e3=$_GET['ec'];
$e4=$_GET['ed'];
$option1=$_GET['optiona'];
$option2=$_GET['optionb'];
$option3=$_GET['optionc'];
$option4=$_GET['optiond'];
$option5=$_GET['optione'];
$sql="insert into timu(lesson_id,que,a,b,c,d,aws) VALUE ('$lesson','$tm1','$a1','$a2','$a3','$a4','$option1')";
$sql2="insert into timu(lesson_id,que,a,b,c,d,aws) VALUE ('$lesson','$tm2','$b1','$b2','$b3','$b4','$option2')";
$sql3="insert into timu(lesson_id,que,a,b,c,d,aws) VALUE ('$lesson','$tm3','$c1','$c2','$c3','$c4','$option3')";
$sql4="insert into timu(lesson_id,que,a,b,c,d,aws) VALUE ('$lesson','$tm4','$d1','$d2','$d3','$d4','$option4')";
$sql5="insert into timu(lesson_id,que,a,b,c,d,aws) VALUE ('$lesson','$tm5','$e1','$e2','$e3','$e4','$option5')";
$result=mysqli_query($conn,$sql);
$result2=mysqli_query($conn,$sql2);
$result3=mysqli_query($conn,$sql3);
$result4=mysqli_query($conn,$sql4);
$result5=mysqli_query($conn,$sql5);
if ($result&$result2&$result3&$result4&$result5) {
    echo "添加成功";


} else {

    echo mysqli_error($conn);
}