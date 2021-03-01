<?php
session_start();
include_once ("conn/conn.php");
//$ID=@ $_SESSION[ID];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="assets/header.css"/>
		<link rel="stylesheet" type="text/css" href="assets/main.css"/>
		<link rel="stylesheet" type="text/css" href="assets/footer.css"/>
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
	</head>
	<body>
		<div class="search-warp">
			<div class="search" style="background-color: ">
				<form action="search/search_interface.php" method="get">
					<input type="text" class="content" name="search" placeholder="Search our courses"/>
					<input type="submit" class="submit" value="Search"/>
					<div class="hotTags" style="position:absolute;top: 36px;right: 476px;color: #464646;">
						<span></span>
						<span></span>
					</div>
				</form>
			</div>

		</div>
		<div id="header-warp">
			<div class="header">
				<div class="logo0">
					<a href="javascript:void(0)">
					</a>
				</div>
				<div class="logo1">
					<a href="index.php">
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
                                <a href="log/login.php" onclick="login()">Sign In</a>
                            </li>
                        </ul>
                    </div>
                    <div class="register-area">
                        <ul>
                            <li>
                                <a href="log/register.php" onclick="register()">Register</a>
                            </li>
                        </ul>
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="username">
						<a href="user/user_interface.php" onclick="login()" style="float: right; font-size: 50px; padding-right: 35px; padding-top: 20px; color: #000000; ">  您好：<?php echo $_SESSION["username"]?></a>
                    </div>
                    <?php
                }
                ?>
				
			</div>
		</div>
        <div class="cover" style="display:none;"></div>
		<div style="margin-top: 72px;" id="main-warp">
			
			<div class="main">
				
				<div class="bgfff banner-box">
					<div class="g-banner">
						<div class="menuContent">
							<div class="item"><a href="javascript:void(0)">编程 / 需求 / 测试</a></div>
							<div class="item"><a href="javascript:void(0)">金融类 / 会计 / 营销策划</a></div>
							<div class="item"><a href="javascript:void(0)">高中 / 初中 / 小学</a></div>
							<div class="item"><a href="javascript:void(0)">英语 / 日语 / 小语种</a></div>
							<div class="item"><a href="javascript:void(0)">健康食谱 / 生活妙招</a></div>
							<div class="item"><a href="javascript:void(0)">瑜伽 / 茶道 / 插花</a></div>
						</div>
						<section class="banner full">
							<article class="g-banner-content">
								<div class="g-banner-content-box">
									<a href="#"><img src="image/u0.jpeg" ></a>
								</div>
							</article>
							
							<article>
								<div class="g-banner-content-box">
									<a href="#"><img src="image/u1.jpg"></a>
								</div>
							</article>
							<article>
								<div class="g-banner-content-box" >
									<a href="#"><img src="image/u2.jpeg"></a>
								</div>
							</article>
						</section>
						
					</div>
					
				</div>
				
				<div class="bg000">
					<div class="title">
						<span style="font-size: 60px;color: black;font-weight: bold;">FREE COURSES</span>
		
					</div>
					<div class="course-warp">
						<div class="course-list">
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="image/box1.jpeg" />
									</div>
									<div class="desc">
										<hr>
										<h3>编程必备基础 计算机组成原理+操作系统+计算机网络</h3>
										<br><br>
										<h5 style="margin-left: 10px;color: #838383;">weike.com</h5>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="image/box2.jpeg" />
									</div>
									<div class="desc">
										<hr>
										<h3>编程必备基础 计算机组成原理+操作系统+计算机网络</h3>
										<br><br>
										<h5 style="margin-left: 10px;color: #838383;">weike.com</h5>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="image/box3.jpeg" />
									</div>
									<div class="desc">
										<hr>
										<h3>编程必备基础 计算机组成原理+操作系统+计算机网络</h3>
										<br><br>
										<h5 style="margin-left: 10px;color: #838383;">weike.com</h5>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="image/box4.jpg" />
									</div>
									<div class="desc">
										<hr>
										<h3>编程必备基础 计算机组成原理+操作系统+计算机网络</h3>
										<br><br>
										<h5 style="margin-left: 10px;color: #838383;">weike.com</h5>
									</div>
								</a>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div id="footer-warp">
			<div class="footer">
				
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
</script>
