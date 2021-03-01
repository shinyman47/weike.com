<?php
include_once ("../conn/conn.php");
session_start();
$lesson_id=@ $_GET['lesson_id'];
$username=@ $_SESSION['username'];
$user_id=@ $_SESSION['ID'];
$_SESSION["lesson_id"]=$lesson_id;
$sql=mysqli_query($conn,"select * from lesson_p where Id = $lesson_id");
$info=mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="header.css"/>
		<link rel="stylesheet" type="text/css" href="main.css" />
		
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/jquery-1.5.1.js" type="text/javascript"></script>
		<script src="js/jquery.raty.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="header-warp">
			<div class="header">
				<div class="logo0">
					<a href="javascript:void(0)">
					</a>
				</div>
				<div class="logo1">
					<a href="javascript:void(0)">
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
								<a href="../index.php">index</a>
							</li>
						<ul>
				</div>
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
                <div class="login-area">
                    <ul>
                        <li>
                            <a href="../user/user_interface.php" onclick="login()"><?php echo $_SESSION["username"]?></a>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>

		</div>
		<div class="main">
			<div class="course-warp">
				<div class="course-warp-head">
					<h4><?php
                        echo $info["lesson_name"];
                        ?></h4>
				</div>
				<div class="course-warp-main">
					<div class="left">
						<div class="leftImg">
							<img src="../image/lessonimg/<?php echo $info["address"];?>">
						</div>	
					</div>
					<div class="right">
						<h1><?php
                            echo $info["lesson_name"];
                            ?></h1></br>
						<h4>开课时间：<?php echo $info["time_b"]?>到<?php echo $info["time_e"]?></h4></br>
						<div class="courseType">
							</br>
                            <?php
                            if ($info["mon"]==1){
                                ?>
                                <h1>会员专享</h1>
                                <?php
                            }
                            else{
                                echo "<h1>免费</h1>";
                            }
                            ?>
							<h5><?php echo $info["people_num"]?>人已参加</h5></br>
						</div>
						</br></br>
                        <?php
                        $sql1="select * from sub WHERE user_id='$user_id' and lesson_id='$lesson_id'";
                        $result1=mysqli_query($conn,$sql1);
                        $total = mysqli_num_rows($result1);
                        if($total==0) {
                            ?>
                            <form action="sub.php" method="get">
                                <input type="submit" class="btn btn-primary" value="立即参加">
                            </form>
                            <?php
                        }
                        else {
                            ?>
                            <a href="courseply_interface.php?lesson_id=<?php echo "$lesson_id"?>"><button>您已订阅，点击观看</button></a>
                            <?php
                        }
                        ?>
                    </div>
				</div>
			</div>
			<div class="course-msg">
				<div class="course-msg-warp">
					<button onclick="convert1()">课程介绍</button>
                    <button onclick="convert3()">课程评价</button>
					<div class="line">
					</div>
					<div class="course-msg-introduce">
						<div class="introduce">
							<h4>
                                <?php
                                $sql="SELECT * FROM lesson_p WHERE Id=$lesson_id";
                                $result = mysqli_query($conn, $sql);
                                $info=mysqli_fetch_array($result);
                                echo $info["introduction"];
                                ?>
                            </h4>
						</div>
						
					</div>
                    <div class="course-msg-comment">
						<div class="comment">
							<h4>
                                <?php
                                $sql1="SELECT * FROM mark WHERE lesson_id=$lesson_id and ys=1";
                                $result1=mysqli_query($conn, $sql1);
                                while ($info1=mysqli_fetch_array($result1)){
                                echo "用户".$info1["username"];
                                ?>说
                            </h4>
                            <h4><?php
                                echo $info1["mark"];
                                }
                                ?></h4>
						</div>
                        <div class="addcomment">
                            <form action="mark_do.php" method="get" id="form2">
							<input type="text" name="text" id="text" class="content" placeholder="  我也来说两句……"/>
                            <input type="submit" class="btn btn-primary" value="sub">
                            </form>
						</div>
						
					</div>
				</div>
				<div class="course-msg-teach">
					<div class="block">
					</div>
					<h3 >授课老师</h3>
					<img src="image/teacher.jpg" />
					<h4 style="float: right; padding-right: 40px; padding-top: 20px;"><?php echo $info["teacher"]?></h4>
					
				</div>
			</div>
			<div class="remark">
				<p style="font-size:20px">请为课程评分：</p>
				<div id="star2"></div>
				<div id="result2"></div>
			</div>
		</div>
		<div class="remark-form-wrap" style="display: none;">
			<div class="remark-form">
				<div class="remark-conmment">
					<input placeholder="发表评论…" /></br></br>
					<button>
						发表
					</button>
				</div>	
				<div class="star">
					<p style="font-size:20px">请给出你的评分(十分制)：</p>
					<div id="star2"></div>
					<div id="result2"></div>
				</div>
				<button type="button" class="del1" onclick="del1()">x</button>
			</div>
		</div>
		<div class="cover" style="display:none;"></div>
	</body>
</html>
<script type="text/javascript">
	function convert3(){
		$('.course-msg-comment').css("display",'block');
		$('.course-msg-index').css("display",'none');
		$('.course-msg-introduce').css("display",'none');
	}
	function convert2(){
		$('.course-msg-index').css("display",'block');
		$('.course-msg-introduce').css("display",'none');
		$('.course-msg-comment').css("display",'none');
	}
	function convert1() {
		$('.course-msg-introduce').css("display",'block');
		$('.course-msg-index').css("display",'none');
		$('.course-msg-comment').css("display",'none');
	}
	function remark(){
		$('.remark-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del1() {
		$('.remark-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
</script>

<script type="text/javascript">
rat('star1','result1',10);
rat('star2','result2',1);
function rat(star,result,m){

	star= '#' + star;
	result= '#' + result;
	$(result).hide();//将结果DIV隐藏

	$(star).raty({
		hints: ['10','20', '30', '40', '50','60', '70', '80', '90', '100'],
		path: "css/img",
		starOff: 'star-off-big.png',
		starOn: 'star-on-big.png',
		size: 24,
		start: 40,
		showHalf: true,
		target: result,
		targetKeep : true,//targetKeep 属性设置为true，用户的选择值才会被保持在目标DIV中，否则只是鼠标悬停时有值，而鼠标离开后这个值就会消失
		click: function (score, evt) {
			//第一种方式：直接取值
			alert('你的评分是'+score*m+'分');
		}
	});

	/*第二种方式可以设置一个隐蔽的HTML元素来保存用户的选择值，然后可以在脚本里面通过jQuery选中这个元素来处理该值。 弹出结果
	var text = $(result).text();
	$('img').click(function () {
		if ($(result).text() != text) {
			alert('你的评分是'+$(result).text()/m+'分');
			alert(result);
			return;
		}
	});*/
}
</script>
