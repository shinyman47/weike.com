<?php
header("Content-Type: text/html;charset=utf-8");
include_once("../conn/conn.php");
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 2021/2/19
 * Time: 19:57

// */
if($_GET['type']== 1)
{
if (isset($_FILES['imgfile'])
    && is_uploaded_file($_FILES['imgfile']['tmp_name'])
) {
    $imgFile = $_FILES['imgfile'];
    $upErr = $imgFile['error'];
    if ($upErr == 0) {
        $imgType = $imgFile['type']; //文件类型。
        /* 判断文件类型，这个例子里仅支持jpg和gif类型的图片文件。*/
        if ($imgType == 'image/jpeg'
            || $imgType == 'image/gif'
        ) {
            $imgFileName = $imgFile['name'];
            $imgSize = $imgFile['size'];
            $imgTmpFile = $imgFile['tmp_name'];
            /*
             将文件从临时文件夹移到上传文件夹中。
            注意：upfile这个文件夹必须先创建好，不然会报错。
            */
            move_uploaded_file($imgTmpFile, '../image/lessonimg/' . $imgFileName);
            /*显示上传后的文件的信息。*/
        } else {
            echo "请选择jpg或gif文件，不支持其它类型的文件。";
        }
    } else {
        echo "文件上传失败。<br>";
        switch ($upErr) {
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
header("Content-Type: text/html;charset=utf-8");
include_once("../conn/conn.php");
$lesson_name = $_POST["name"];
$publishDate1 = $_POST['dateB'];
$begin = date("Y-m-d", strtotime($publishDate1));
$publishDate2 = $_POST['dateE'];
$end = date("Y-m-d", strtotime($publishDate2));
$type = $_POST['type'];
$teacher = $_POST['teacher'];
$mon = $_POST['mon'];
$jianjie = $_POST['jianjie'];
$sql = "select * from lesson_p where lesson_name='$lesson_name'";
$check = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($check);
if ($info == true) {
    echo "<script charset='gb2312' type='text/javascript'>alert('该课程名已存在，请重新写');location='javascript:history.back()';</script>";
} else {
    $sql1 = "insert into lesson_p(lesson_name,address,introduction,class,time_b,time_e,mon,teacher) values('$lesson_name','$imgFileName','$jianjie','$type','$begin','$end',$mon,'$teacher')";
    $result = mysqli_query($conn, $sql1);
    if ($result) {
        echo "<script charset='gb2312' type='text/javascript'>alert('添加成功')</script>";
        $sql = "select * from lesson_p where lesson_name='$lesson_name'";
        $check = mysqli_query($conn, $sql);
        $info = mysqli_fetch_array($check);
        $lesson_id=$info['Id'];
        $kk="Refresh:2;url=addCourse.php?lesson_id=$lesson_id";
        header($kk);

    } else {
        //echo "<script charset='gb2312' type='text/javascript'>alert('添加失败');location='javascript:history.back()';</script>";
        echo mysqli_error($conn);
    }

}
}
elseif($_GET['type']== 2)
{



    header("content-type:text/html; charset=utf8");
    global $count;

    global $lesson_id;
    $lesson_id=$_GET["lesson_id"];
    if(!empty($_FILES)){
        //print_r($_FILES['upload_imgs']);exit;

        function upload_files($name){

            $files =  $_FILES[$name];

            $k1 = $k2 = array();
            foreach($files as $key => $val){
                if($key == 'tmp_name'){
                    $k1 = $val;
                }
                if($key == 'name'){
                    $k2 = $val;
                }
            }

            //$filenames 保存移动后的文件名
            $filenames = array();
            foreach($k1 as $key => $val){
                //$rename 获取原始文件名 (不包括后缀名)
                $rename = substr($k2[$key],0,strpos($k2[$key],'.'));

                //$suffix 文件后缀名
                $suffix = substr($k2[$key],strpos($k2[$key],'.'));

                //echo md5($rename) . $suffix;exit;
                $time = time();
                //如果不存在upload文件夹则创建upload文件夹
                if(!is_dir('../video')){
                    mkdir('../video');
                }
                if(!is_dir('../video/'.$GLOBALS['lesson_id'])){
                    mkdir('../video/'.$GLOBALS['lesson_id']);
                }
                move_uploaded_file($val,'../video/'.$GLOBALS['lesson_id'].'/' .md5($rename . $time) . $suffix);

                $filenames[] = '../video/'.$GLOBALS['lesson_id'].'/' .md5($rename . $time) . $suffix;
                $GLOBALS['count']=$GLOBALS['count']+1;
            }

            print_r($filenames);
//        数组形式返回所上传的文件路径
            return $filenames;
        }


        upload_files('upload_imgs');
        $sql="update lesson_p set number=$count WHERE Id=$lesson_id";
        $result=mysqli_query($conn,$sql);



    }






}















