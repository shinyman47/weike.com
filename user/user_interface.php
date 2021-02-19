<?php
session_start();
require_once('../conn/conn.php');
//$ID=@ $_SESSION[ID];
if(@ $_SESSION['username']==''){
echo "<script language='javascript'>alert('您还未登入');</script>";
    header("Refresh:2;url=login.php");
    exit;}
else {
    $username=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="CSS/header.css"/>
		<link rel="stylesheet" type="text/css" href="CSS/main.css" />
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body background="../image/bg0.jpg">
		<div id="header-warp">
			<div class="header">
				<div class="logo0">
					<a href="javascript:void(0)">
					</a>
				</div>
				<div class="logo1">
					<a href="../index.php">
						<img src="../image/weike1.png" >
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
								<a href="../index.php">shop</a>
							</li>
						<ul>
				</div>
				</div>
				<!--<div class="login-area">
					<ul>
						<li>
							<a href="javascript:void(0)" onclick="login()">Sign In</a>
						</li>
					</ul>
				</div>-->
				<div class="register-area">
					<ul>
						<li>
							<a href="../log/logout.php">Loginout</a>
						</li>
					</ul>
				</div>
				<!--<div class="search-warp">
					<div class="search">
						<form action="/" method="get">
							<input type="text" class="content" placeholder="请输入关键字..."/>
							<input type="submit" class="submit" value="搜索"/>
							<div class="hotTags" style="position:absolute;top: 36px;right: 476px;color: #464646;">
								<span></span>
								<span></span>
							</div>
						</form>
					</div>
				</div>-->
			</div>
        <div class="main">
			<div class="leftSide">
				<div class="userInfo">
					<div class="img">
						<img src="../image/head.png" >
					</div>	
					<div class="spaceNickname">
						<p class="nickname"><?php echo "用户:$username 欢迎您"; ?></p>
						<a href="#">账号管理</a>
					</div>
				</div>
				<div class="funcList">
					<a href="#" style="color: #000000;">首页</a></br></br></br>
					<a href="#" style="color: #000000;">笔记</a></br></br></br>
					<a href="#" style="color: #000000;">收件箱</a></br></br></br>
                </div>
			</div>
			<div class="rightSide">
				<div class="rightSide_head">
					<a href="#" onclick="del2()"></a>
                    <div class="search">
							<form action="/" method="get">
								<input type="text" class="content" placeholder=""/>
								<input type="submit" class="submit" value="Sub"/>
								<div class="hotTags" style="position:absolute;top: 36px;right: 476px;color: #464646;">
									<span></span>
									<span></span>
								</div>
							</form>
                    </div>
				</div>
				
				<div class="rightSide_main">
					<div class="rightSide_learn">
						<h1>我学的课（视频列表）</h1>
                        <?php
                        $sql="select * from sub WHERE username='$username'";
                        $result=mysqli_query($conn,$sql);
                        while ($info=mysqli_fetch_assoc($result)){
                            $sql1="select * from lesson_p WHERE Id=".$info['lesson_id']."";
                            $result1=mysqli_query($conn,$sql1);
                            $info1=mysqli_fetch_array($result1);
                            ?>
                            <div class="course">
                                <a href="../courses/courseply_interface.php?lesson_id=<?php echo $info1['Id'];?>" >
                                    <img src="<?php echo $info1['address']; ?>" style="height: 200px; height: 200px;">
                                </a>
								</br></br>
								<a href="../courses/courseply_interface.php?lesson_id=<?php echo $info1['Id'];?>" style="padding-left: 150px; font-size: 20px; color: #000000;">
								    <?php echo $info1['lesson_name'] ;?>
								</a>
                            </div>
                        <?php }
                        ?>
					</div>
                </div>
			</div>
		</div>
			
	</body>
</html>
<script type="text/javascript">
	function login() {
		$('.login-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del0() {
		$('.login-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
	function register(){
		$('.register-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del1() {
		$('.register-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
	function teach(){
		$('.rightSide_teach').css("display",'block');
		$('.rightSide_learn').css("display",'none');
	}
	function del2() {
		$('.rightSide_teach').css("display",'none');
		$('.rightSide_learn').css("display",'block');
	}
</script>
