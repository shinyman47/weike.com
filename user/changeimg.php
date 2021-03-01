<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/21
 * Time: 19:43
 */
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
session_start();
$name=$_SESSION['username'];
$id=$_SESSION['ID'];
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

$sql="update tb_user  set  address='$imgFileName' WHERE ID='$id'";
$result=mysqli_query($conn,$sql);
if($result!=false){
    echo "头像修改成功";
    header("Refresh:2;url=user_interface.php");
    exit();
}
else{
    echo "头像修改失败";
    header("Refresh:2;url=user_interface.php");


}