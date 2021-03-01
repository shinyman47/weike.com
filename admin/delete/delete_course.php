<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/20
 * Time: 18:04
 */
include_once("../../conn/conn.php");
while(list($name,$value)=each($_GET)){
    mysqli_query($conn,"delete from lesson_p where Id='".$value."'");

}
header("location:../course.php");