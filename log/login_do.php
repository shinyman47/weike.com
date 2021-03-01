<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/1/31
 * Time: 15:06
 */
header("Content-Type: text/html;charset=utf-8");
include ("../conn/conn.php");
$user = $_GET["user"];
$password = $_GET["password"];
class chkinput{
    var $name;
    var $password;

    function __construct($x,$y){
        $this->name=$x;
        $this->password=$y;
    }
    function checkinput(){
        $conn = mysqli_connect("localhost", "root", "root", "db_database10") or die("连接数据库服务器失败！".mysqli_error());
        mysqli_query($conn,"set names 'utf8'");
        $sql=mysqli_query($conn,"select * from tb_user where username='".$this->name."'" );
        $info=mysqli_fetch_array($sql);
        if($info==false){
            echo "没有这个用户，2秒后重新登录";
            header("Refresh:2;url=login.php");
            exit();
        }
        else{
            if($info['pwd']==$this->password){
                session_start();
                $_SESSION["username"]=$info["username"];
                $_SESSION["ID"]=$info["ID"];
                header("Refresh:2;../user/user_interface.php");
                exit();
            }
            else{
                echo "密码输入错误，2秒后重新登录";
                header("Refresh:2;url=login.php");
            }
        }
    }
}
$obj=new chkinput(trim($user),trim($password));
$obj->checkinput();