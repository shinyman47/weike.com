<?php
$conn = mysqli_connect("localhost", "root", "root", "db_database10") or die("连接数据库服务器失败！".mysqli_error());
mysqli_query($conn,"set names 'utf8'");
?>
