<?php

header("Content-Type: text/html;charset=utf-8");
session_start();
require_once('../conn/conn.php');
//$ID=@ $_SESSION[ID];
if(@ $_SESSION['ID']==''){
    echo "<script charset='gb2312' type='text/javascript' language='javascript'>alert('您还未登入');</script>";
    header("Refresh:2;url=../log/login.php");
    exit;}
else {
    $username=$_SESSION['username'];//评价用户姓名
    $user_id=$_SESSION['ID'];
}
$lesson_id=@ $_GET['lesson_id'];
$sql=mysqli_query($conn,"select * from lesson_p where Id = $lesson_id");
$info=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="lessoncss/header.css"/>
		<link rel="stylesheet" type="text/css" href="lessoncss/main.css" />
		
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div id="header-warp">
			<div class="header">
				<div class="logo0">
					<a href="javascript:void(0)">
					</a>
				</div>
				<div class="logo1">
					<a href="../index.php">
						<img src="image/weike1.png" >
					</a>
				</div>
				
				<div class="nav-item">
						<ul>
							<li>
								<a href="javascript:void(0)">Curses</a>
		                    </li>
						
							<li>
								<a href="javascript:void(0)">Tests</a>
							</li>
				
							<li>
								<a href="javascript:void(0)">Shop</a>
							</li>
						<ul>
					</div>
		        <?php
		        if(@ $_SESSION['username']=='') {
		            ?>
		            <div class="login-area">
		                <ul>
		                    <li>
		                        <a href="../log/login.php" onclick="login()">Sign In</a>
		                    </li>
		                </ul>
		            </div>
		            <div class="register-area">
		                <ul>
		                    <li>
		                        <a href="../log/register.php" onclick="register()">Register</a>
		                    </li>
		                </ul>
		            </div>
		            <?php
		        }
		        else {
		            ?>
		            <div class="username">
						<a href="../user/user_interface.php" onclick="login()" style="float: right; font-size: 50px; padding-right: 35px; padding-top: 20px; color: #000000; ">  您好：<?php echo $_SESSION["username"]?></a>
		            </div>
		            <?php
		        }
		        ?>
				
			</div>
		</div>
		
		<div class="main">
			<div class="leftSide">
				<div class="leftSide-head">
					<a href="course_interface.php?lesson_id=<?php echo $lesson_id?>">Back To Course</a>
					<div class="course-name">
                        <h1><?php
                        echo $info["lesson_name"];
                            ?></h1>
					</div>
				</div>
				<div class="leftSide-course">
					<div class="option">
						<button onclick="convert1()">
							视频
						</button>
						<button onclick="convert2()">
							章节测验
						</button>
						<div class="line">
							
						</div>
					</div>
					<div class="video">
                        <?php
                        if((@ $_GET['num'])==""){
                            //$pagecount=intval($total/$pagesize);
                            $num=1;
                            //如果总数小于5则页码显示为1页；
                        }else{
                            $num=($_GET['num']);
                            //如果大于5条则显示实际的总数；
                        }
                        ?>
						<video controls>
						  <source src="../video/<?php echo $info["Id"]; ?>/<?php echo $num?>.mp4" >
						</video>
					</div>
					<div class="test" style="height: 600px; width: 60%; position: absolute;top: 61%; left: 10%; display:none;">
						<div class="test-content" style="height: 100%; width: 100%; background: url(../log/img/background.png); position: inherit; overflow-y: scroll; padding-left: 30px; color: #FFFFFF;">
							<h2>课后小测试</h2>
                            <form action="check.php" method="get">
                                <?php
                                $sql="select * from timu WHERE lesson_id=$lesson_id";
                                $result=mysqli_query($conn,$sql);
                                $count=0;
                                while ($info1=mysqli_fetch_array($result)) {
                                    $count=$count+1;
                                    ?>

                                    <h3><?php echo $info1['que'] ?></h3>
                                    <input type="hidden" name="lesson_id" value="<?php echo $lesson_id ?>">
                                    <input type="radio" name="option<?php echo $count ?>" value="A"><?php echo $info1['a'] ?><br>
                                    <input type="radio" name="option<?php echo $count ?>" value="B"><?php echo $info1['b'] ?><br>
                                    <input type="radio" name="option<?php echo $count ?>" value="C"><?php echo $info1['c'] ?><br>
                                    <input type="radio" name="option<?php echo $count ?>" value="D"><?php echo $info1['d'] ?><br>

                                    <?php
                                }
                                ?><input type="submit" value="提交">
                            </form>
						</div>
					</div>
				</div>
				<div class="leftSide-foot">
					
				</div>
			</div>
			<div class="rightSide">
				<div class="right-head">
					<button>
						目录
					</button>
                </div>
				<div class="courseIndex">
                    <?php
                    $num=$info["number"];
                    for ($i=1;$i<=$num;$i++){
                        ?>
                        <a href="courseply_interface.php?lesson_id=<?php echo $lesson_id?>&amp;num=<?php echo $i?>">
                            <?php
                            echo $i;
                            ?></a><br/><?php
                    }
                    ?>

                </div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	
	function convert2(){
		$('.test').css("display",'block');
		$('.video').css("display",'none');
		
	}
	function convert1() {
		$('video').css("display",'block');
		$('.test').css("display",'none');
		
	}
	
</script>