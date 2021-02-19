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
			<div class="search">
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
				<div class="container-types">
					<div class="title">
						<span>零基础就业</span>
						<span class="intro">从入门到具备1年开发经验</span>
					</div>
					<div class="list">
						<a href="javascript:void(0)">
							<div class="a" style="background-position: 0px 0px;"></div>
							<span><b>Web</b>前端攻城狮</span>
						</a>
						<a href="javascript:void(0)">
							<div class="b" style="background-position: 0px -50px;"></div>
							<span><b>Java</b>前端攻城狮</span>
						</a>
						<a href="javascript:void(0)">
							<div class="c" style="background-position: px -100px;"></div>
							<span><b>Python</b>前端攻城狮</span>
						</a>
						<a href="javascript:void(0)">
							<div class="d" style="background-position: 0px -150px;"></div>
							<span><b>Android</b>前端攻城狮</span>
						</a>
						<a href="javascript:void(0)">
							<div class="e" style="background-position: 0px -200px;"></div>
							<span><b>PHP</b>前端攻城狮</span>
						</a>
					</div>
				</div>
				<div class="bg000">
					<div class="title">
						<a href="javascript:void(0)"><span style="font-size: 24px;color: black;">热门课程</span></a>
						<a href="javascript:void(0)"><span>实战课程</span></a>
						<a href="javascript:void(0)"><span>免费课程</span></a>
					</div>
					<div class="course-warp">
						<div class="course-list">
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img3.mukewang.com/szimg/5e32d2530847528006000338-360-202.jpg" >
									</div>
									<div class="desc">
										<h3>Python3入门人工智能 掌握机器学习+深度学习 提升实战能力</h3>
									</div>
								</a>
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img2.mukewang.com/szimg/5e26a9f909ef95b512000676-360-202.png" >
									</div>
									<div class="desc">
										<h3>2020 重学C++ 重构你的C++知识体系</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img2.mukewang.com/szimg/5e3cfea008e9a61b06000338-360-202.jpg" >
									</div>
									<div class="desc">
										<h3>前端框架及项目面试 聚焦Vue/React/Webpack</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img2.mukewang.com/szimg/5d1032ab08719e0906000338-360-202.jpg" >
									</div>
									<div class="desc">
										<h3>编程必备基础 计算机组成原理+操作系统+计算机网络</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img1.mukewang.com/szimg/5e4644f609ffdfa312000676-360-202.png" >
									</div>
									<div class="desc">
										<h3>剑指Java自研框架，决胜Spring源码</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img2.mukewang.com/szimg/5e5621d0092c054612000676-360-202.png" >
									</div>
									<div class="desc">
										<h3>剑指Java自研框架，决胜Spring源码</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img1.mukewang.com/szimg/5e4644f609ffdfa312000676-360-202.png" >
									</div>
									<div class="desc">
										<h3>剑指Java自研框架，决胜Spring源码</h3>
									</div>
								</a>
								
							</div>
							<div class="course-box">
								<a href="javascript:void(0)">
									<div class="im">
										<img src="https://img1.mukewang.com/szimg/5e4644f609ffdfa312000676-360-202.png" >
									</div>
									<div class="desc">
										<h3>剑指Java自研框架，决胜Spring源码</h3>
									</div>
								</a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div id="footer-warp">
			<div class="footer">版权所有 未经许可 不得转载</div>
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
