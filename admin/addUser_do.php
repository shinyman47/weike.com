<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/19
 * Time: 19:39
 */
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
$imgFileName;
if (isset($_FILES['imgfile'])
    && is_uploaded_file($_FILES['imgfile']['tmp_name']))
{
    $imgFile = $_FILES['imgfile'];
    $upErr = $imgFile['error'];
    if ($upErr == 0)
    {
        $imgType = $imgFile['type']; //文件类型。
        /* 判断文件类型，这个例子里仅支持jpg和gif类型的图片文件。*/
        if ($imgType == 'image/jpeg'
            || $imgType == 'image/gif')
        {
            $imgFileName = $imgFile['name'];
            $imgSize = $imgFile['size'];
            $imgTmpFile = $imgFile['tmp_name'];
            /*
             将文件从临时文件夹移到上传文件夹中。
            注意：upfile这个文件夹必须先创建好，不然会报错。
            */
            move_uploaded_file($imgTmpFile, '../image/userimg/'.$imgFileName);
            /*显示上传后的文件的信息。*/
        }
        else
        {
            echo "请选择jpg或gif文件，不支持其它类型的文件。";
        }
    }
    else
    {
        echo "文件上传失败。<br>";
        switch ($upErr)
        {
            case 1:
                echo "超过了php.ini中设置的上传文件大小。";
                break;
            case 2:
                echo "超过了MAX_FILE_SIZE选项指定的文件大小。";
                break;
            case 3:
                echo "文件只有部分被上传。";
                break;
            case 4:
                echo "文件未被上传。";
                break;
            case 5:
                echo "上传文件大小为0";
                break;
        }
    }
}
else
{
}
$user=$_POST["user"];
$password=$_POST['pwd'];
$qq=$_POST['qq'];
$que=$_POST['que'];
$aws=$_POST['aws'];
$mon=$_POST['mon'];
$sql = "select * from tb_user where username='$user'";
$check = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($check);
if ($info==true) {
    echo "<script charset='gb2312' type='text/javascript'>alert('用户名已存在，请重新写');location='javascript:history.back()';</script>";
}
else {
    $sql1 = "insert into tb_user(username,address,pwd,qq,que,aws,mon) values('$user','$imgFileName','$password','$qq','$que','$aws',$mon)";
    $result = mysqli_query($conn, $sql1);
    if ($result) {
        echo "<script charset='gb2312' type='text/javascript'>alert('添加成功');location='javascript:history.back()';</script>";
    } else {
        echo "<script charset='gb2312' type='text/javascript'>alert('添加失败');location='javascript:history.back()';</script>";
    }
}