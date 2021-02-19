<?php
include_once ("../conn/conn.php");
$lesson_id=@ $_GET['lesson_id'];

$sql=mysqli_query($conn,"select * from video where Id = 1");
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
					<a href="course_interface.php">Back To Course</a>
					<div class="course-name">
                        <h1><?php
                        echo $info["lesson_name"];
                            ?></h1>
					</div>
				</div>
				<div class="leftSide-course">
					<div class="option">
						<button>
							视频
						</button>
						<button>
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
						  <source src="video/<?php echo $info["lesson_name"]; ?>/<?php echo $num?>.mp4" type="../video/java/mp4">
						</video>
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
					<button>
						讨论
					</button>
					<button>
						笔记
					</button>
				</div>
				<div class="courseIndex">
                    <?php
                    $num=$info["number"];
                    for ($i=1;$i<=$num;$i++){
                        ?>
                        <a href="courseply_interface.php?num=<?php echo $i?>">
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
