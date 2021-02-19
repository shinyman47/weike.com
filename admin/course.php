<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>课程管理</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="function-warp" style="padding-left:140px;">
			<div class="addCourse">
				<button onclick="register()">
					增加课程
				</button>
			</div>
			<div class="searchCourse">
				<button>
					查询课程
				</button>
				<div class="search-warp" style="float: right;">
					<div class="search">
						<form action="/" method="get">
							<input type="text" class="content" placeholder="   查询课程"/>
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
				<table border="1" cellpadding="10" cellspacing="">
				    <tr>
				        <th>课程ID</th>
				        <th>课程名</th>
						<th>图片地址</th>
						<th>课程简介</th>
						<th>课程评分</th>
						<th>课程起始时间</th>
						<th>
							课程结束时间
						</th>
						<th>
							是否需要会员
						</th>
						<th>
							参与人数
						</th>
						<th>
							授课教师
						</th>
				    </tr>
				    <tr>
				        <th>123</th>
				        <th>c语言</th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
						<th>
							<button>
								修改课程
							</button>
						</th>
						<th>
							<button>
								删除课程
							</button>
						</th>
				    </tr>
				    <tr>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th></th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
				        <th>
				        	
				        </th>
						<th>
							<button>
								修改课程
							</button>
						</th>
						<th>
							<button>
								删除课程
							</button>
						</th>
				    </tr>
				</table>
			</div>
		</div>
		<div class="course-form-wrap" style="display: none;">
			<div class="register-form">
				<form action="/" method="get">
					<input type="text" class="user" name="username" value="" placeholder="请输入课程id"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程名"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程图片地址"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程简介"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程评分"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程起始时间"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程结束时间"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程是否需要会员"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程参与人数"/> <br>
					<input type="password" class="pwd" name="pwd" placeholder="请输入课程授课教师"/> <br>
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
		$('.course-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del1() {
		$('.course-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
</script>