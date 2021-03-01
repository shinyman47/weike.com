<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/3/1
 * Time: 10:33
 */
header("Content-Type: text/html;charset=utf-8");
session_start();
include_once ("../conn/conn.php");
$id=$_SESSION['ID'];

$money=$_GET['money'];
$time=$_GET['time'];

$username=$_SESSION['username'];
$time_b=date("Y-m-d");
$time_e=date('Y-m-d',strtotime('+'.$time.' month'));
$sql="select * from tb_user WHERE ID=$id";
$result=mysqli_query($conn,$sql);
$info=mysqli_fetch_array($result);

if($info['mon']==0){

    mysqli_query($conn,"update tb_user set mon=1 WHERE ID='$id'");
    $sql="insert into  member_p(user_id,username,time_b,t,money,time_e) VALUES ('$id','$username','$time_b','$time','$money','$time_e')";
    $result3=mysqli_query($conn,$sql);
    if($result3==true) {
            echo "aa";
        }

    else{
        echo mysqli_error($conn);
    }

}
else{

    $sql1="select * from member_p WHERE user_id=$id ORDER BY time_e DESC";
    $result1=mysqli_query($conn,$sql1);
    $info1=mysqli_fetch_array($result1);
    $info1['time_e'];
    $tb= strtotime($info1['time_e']);
    $time_ee=date('Y-m-d', strtotime ('+'.$time.' month', $tb));
    $sql="insert into  member_p(user_id,username,time_b,t,money,time_e) VALUES ('$id','$username','$time_b','$time','$money','$time_ee')";
    $result=mysqli_query($conn,$sql);
    if($result!=0){
        echo "<script charset='gb2312' type='text/javascript'>alert('续费成功');location='javascript:history.back()';</script>";
    }
    else{
        echo "<script charset='gb2312' type='text/javascript'>alert('续费失败');location='javascript:history.back()';</script>";
    }


}

