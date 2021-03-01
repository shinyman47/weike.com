<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/9
 * Time: 13:59
 */
header("Content-Type: text/html;charset=utf-8");
session_start();
include_once ("../conn/conn.php");
$text=$_GET["text"];
$total=0;
$name=$_SESSION['username'];
$lesson_id=$_SESSION['lesson_id'];
if($_SESSION['username']==''){
    echo "<script type='text/javascript'>alert('您还未登入');location='javascript:history.back()';</script>";
}

else {
    $sql="select * from mark WHERE (username='$name' AND lesson_id='$lesson_id')";
    $result=mysqli_query($conn, $sql);
    $total=mysqli_num_rows($result);


    if($total!=0){
        echo "<script type='text/javascript'>alert('您已经发表过评论');location='javascript:history.back()';</script>";
    }
    else{
        $sql2 = "insert into mark(username,lesson_id,mark,ys) values('$_SESSION[username]',$_SESSION[lesson_id],'$text',0) ";
        if (mysqli_query($conn,$sql2) === TRUE) {
            echo "<script type='text/javascript'>alert('您的评论已经提交审核，核实通过后即可显示');location='javascript:history.back()';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('出于不可抗力，递交失败');location='javascript:history.back()';</script>";

        }


    }
}