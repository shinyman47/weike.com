<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/20
 * Time: 16:26
 */
include_once("../conn/conn.php");
while(list($name,$value)=each($_GET)){
    mysqli_query($conn,"delete from class where Id='".$value."'");

}
header("location:../tag.php");