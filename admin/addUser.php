<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加用户</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="main">
			<div class="head">
				<h1>添加用户</h1>
			</div>
			<div class="listwarp">
				
				<div class="list">
                    <form action="addUser_do.php" method="post" name="upload_form" enctype="multipart/form-data">
					<table border="1" cellpadding="15" style="background-color: #f1f1f1; font-size: 20px;">
					    <tr>
					        <th>添加用户</th>
					   
					    </tr>
					    
					    <tr>
					        <td>用户名</td>
					        <td style="width: 300px;">
					        	<input type="text"  value="" name="user"  style="height: 30px; width: 350px;"/>
					        </td>
					    </tr>
						<tr>
						    <td>用户密码</td>
						    <td style="width: 300px;">
						    	<input type="text"  value="" name="pwd" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>用户qq号</td>
						    <td style="width: 300px;">
						    	<input type="text"  name="qq" value="" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>用户头像</td>
						    <td style="width: 300px;">
                                <input name="imgfile" type="file" accept="image/gif, image/jpeg"/>
						    </td>
						</tr>
						<tr>
						    <td>用户密保问题</td>
						    <td style="width: 300px;">
						    	<input list="option" type="text"  name="que" value="" style="height: 30px; width: 350px;"/>
								<datalist id="option">
								    <option value="我的母亲名字">
								    <option value="我的父亲名字">
								    <option value="我的生日">
                                    <option value="我出生的城市">
								</datalist>
						    </td>
						</tr>
						<tr>
						    <td>用户密保答案</td>
						    <td style="width: 300px;">
						    	<input type="text" value="" name="aws" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>是否会员</td>
						    <td style="width: 300px;">
								<input type="radio" name="mon" value="1">是<br>
								<input type="radio" name="mon" value="0">否
							</td>
						</tr>
						
					</table>
                        <input type="submit" naem="upload" value="提交">
                        </input>
                    </form>
				</div>
			</div>
			<div class="btnwarp">
				<div class="btn">

                </div>
			</div>
		</div>
	</body>
</html>
