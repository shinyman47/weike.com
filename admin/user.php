<?php
include_once ("../conn/conn.php")
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>人员管理</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="function-warp" style="padding-left:140px;">
			<div class="addUser">
				<button onclick="register()">
					增加用户
				</button>
			</div>
			<div class="searchUser">
				<button>
					查询用户
				</button>
				<div class="search-warp" style="float: right;">
					<div class="search">
						<form action="/" method="get">
							<input type="text" class="content" placeholder="   查询用户"/>
							<input type="submit" class="submit" value="查询"/>
							<div class="hotTags" style="position:absolute;top: 36px;right: 476px;color: #464646;">
								<span></span>
								<span></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="list-warp">
			<div class="list">
				</br>
				<table style="margin: 0 auto;">
					<tr>
						<th>用户数据</th>
					</tr>
				</table></br>
				<table border="1" cellpadding="30" cellspacing="">
				    <tr>
				        <th>用户ID</th>
				        <th>用户名</th>
						<th>用户密码</th>
						<th>用户QQ号</th>
						<th>用户密保问题</th>
						<th>用户密保答案</th>
						<th>
							
						</th>
						<th>
							
						</th>
				    </tr>
                    <?php
                    $sql="SELECT * FROM tb_user ORDER BY ID";
                    $result = mysqli_query($conn, $sql);
                    while($info=mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <th><?php echo $info["ID"];?></th>
                        <th><?php echo $info["username"];?></th>
                        <th><?php echo $info["pwd"];?></th>
                        <th><?php echo $info["qq"];?></th>
                        <th><?php echo $info["que"];?></th>
                        <th><?php echo $info["aws"];?></th>
                        <th>
                            <button>
                                修改用户
                            </button>
                        </th>
                        <th>
                            <button>
                                删除用户
                            </button>
                        </th>
                        <?php
                        }
                        ?>
				    </tr>
				    <tr>
				        <th>5103041</th>
				        <th>lunatic</th>
				        <th>987654</th>
				        <th>2309814683</th>
				        <th>我的父亲名字</th>
				        <th>优格索托斯</th>
						<th>
							<button>
								修改用户
							</button>
						</th>
						<th>
							<button>
								删除用户
							</button>
						</th>
				    </tr>
				</table>
			</div>
		</div>
		<div class="user-form-wrap" style="display: none;">
			<div class="register-form">
				<form action="/" method="get">
					<input type="text" class="user" name="username" value="" placeholder="请输入用户id"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入用户名"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入用户密码"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入用户qq号"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入用户密保问题"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入用户密保答案"/> <br>
					<input type="submit" class="sub" value="增加" />
				</form>
				<button type="button" class="del1" onclick="del1()">x</button>
			</div>
		</div>
		<div class="cover" style="display:none;"></div>
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
		$('.user-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del1() {
		$('.user-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
</script>