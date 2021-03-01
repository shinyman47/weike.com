<?php
session_start();
require_once('../conn/conn.php');
header("Content-Type: text/html;charset=utf-8");
//$ID=@ $_SESSION[ID];
if(@ $_SESSION['username']==''){
echo "<script language='javascript'>alert('您还未登入');</script>";
    header("Refresh:2;url=../log/login.php");
    exit;}
else {
    $username=$_SESSION['username'];
    $id=$_SESSION['ID'];
    $sql1="select * from member_p WHERE user_id=$id ORDER BY time_e DESC";
    $result1=mysqli_query($conn,$sql1);
    $info1=mysqli_fetch_array($result1);
    $time_b=date("Y-m-d");
    if($time_b>$info1['time_e']){
        $sql="update tb_user  set  mon=0 WHERE ID=$id";
        $result=mysqli_query($conn,$sql);
    }
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
								<a href="../index.php">index</a>
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
                        <?php
                        $sql="select * from tb_user WHERE ID='$id'";
                        $result=mysqli_query($conn,$sql);
                        $info=mysqli_fetch_array($result);
                        ?>
                        <img src="../image/userimg/<?php echo $info['address']?>" >
					</div>	
					<br />
					<div class="spaceNickname">
						<p class="nickname"><?php echo "用户:".$info['username']." 欢迎您"; ?></p>
                        <?php if ($info['mon']==1) {
                            ?>
                            <p class="timelimit" style="color: #54525e; font-size: 5px;">会员到期时间 <?php

                            $sql1="select * from member_p WHERE user_id=$id ORDER BY time_e DESC";
                            $result1=mysqli_query($conn,$sql1);
                            $info1=mysqli_fetch_array($result1);
                            echo $info1['time_e'];

                            ?></p><?php
                        }
                        ?>
						
					</div>
				</div>
				<div class="funcList">
					<a href="#" style="color: #000000;" onclick="del2()">编辑资料</a></br></br></br>
					<a href="#" style="color: #000000;" onclick="del1()">课程</a></br></br></br>
					<a href="#" style="color: #000000;" onclick="del3()">收件箱</a></br></br></br>
					<a href="#" style="color: #000000;" onclick="del4()">充值</a></br></br></br>
                </div>
			</div>
			<div class="rightSide">
				<div class="rightSide_head">
					<a href="#" onclick="del2()"></a>
                    
				</div>
				
				<div class="rightSide_main">
					<div class="rightSide_learn">
						<h1>我学的课（视频列表）</h1>
                        <?php
                        $sql="select * from sub WHERE user_id='$id'";
                        $result=mysqli_query($conn,$sql);
                        while ($info=mysqli_fetch_assoc($result)){
                            $sql1="select * from lesson_p WHERE Id=".$info['lesson_id']."";
                            $result1=mysqli_query($conn,$sql1);
                            $info1=mysqli_fetch_array($result1);
                            ?>
                            <div class="course">
                                <a href="../courses/courseply_interface.php?lesson_id=<?php echo $info1['Id'];?>" >
                                    <img src="../image/lessonimg/<?php echo $info1['address']; ?>" style="height: 200px; height: 200px;">
                                </a>
								</br></br>
								<a href="../courses/courseply_interface.php?lesson_id=<?php echo $info1['Id'];?>" style="padding-left: 150px; font-size: 20px; color: #000000;">
								    <?php echo $info1['lesson_name'] ;?>
								</a>
                            </div>
                        <?php }
                        ?>
					</div>
					<div class="rightSide_info" style="position: absolute; height: 570px; width: 780px; background-color: #FFFFFF; display: none;">
						<div style="position: inherit; width: 100%; height: 100%; padding-left: 6%; overflow-y: scroll;">	
							<h2>用户资料</h2>
							<br>
                            <form method="get" action="changeusername.php">
							<h4>用户名：</h4> <input type="text" name="name"/><input type="submit" value=" 修改用户名">
                            </form>
							<br>
                            <form method="get" action="changepwd.php">
							<h4>用户密码：</h4> <input type="text" name="pwd"/><input type="submit" value="修改密码">
                            </form>
							<br>
							<br>
                            <form method="post" action="changeimg.php" name="upload_form" enctype="multipart/form-data">
							<h4>个人头像：</h4>  <input name="imgfile" type="file" accept="image/gif, image/jpeg" />
                                <input type="submit" value="修改头像">
                            </form>
							<br>
                            <form method="get" action="changeqq.php">
							<h4>我的qq号：</h4> <input type="text" name="qq"/><input type="submit" value="修改qq">
                            </form>
							<br>
							<hr />
							
							<br>
							
						</div>	
					</div>
					<div class="rightSide_msg" style="position: absolute; height: 570px; width: 780px; background-color: #FFFFFF; display:none; overflow-y: scroll;">
						<h2>系统消息</h2>
						<div class="message" style="position: inherit; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">	
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
						
						<div class="message" style="position: inherit; margin-top: 15%; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
						
						<div class="message" style="position: inherit; margin-top: 30%; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
						
						<div class="message" style="position: inherit; margin-top: 45%; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
						<div class="message" style="position: inherit; margin-top: 60%; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
						<div class="message" style="position: inherit; margin-top: 75%; width: 95%; height: 100px; background-color: #000000; margin-left: 2%; border-radius: 8px 8px 8px 8px; background-color: #e5e5e5;">
							<div style="position: inherit; margin-left: 3%;">
								<h6 style="font-weight: bold; color: #000000;">官方系统通知</h6>
								<h6 style="color: #2d2d2d;">2020年2月21日 18：34</h6>
								<h6 style="color: #000000;">您的课程，克苏鲁文学讲坛已开课，请及时开始学习</h6>
							</div>
						</div>
					</div>
					<div class="rightSide_charge" style="position: absolute; height: 660px; width: 780px;display:none;">
						
							<div class="charge-warp-head">
								<h4>会员充值</h4>
							</div>
							<div class="charge-warp-main">
								<br />
								<br />
								<div class="charge-option">
									<a href="menber.php?money=6&time=1"><button onclick="fun1()" class="b1">
										一个月
										<h6 style="color: #848484;">6￥</h6>
									</button></a>&nbsp;&nbsp;
									<a href="menber.php?money=12&time=2"><button onclick="fun2()" class="b2">
										两个月
										<h6 style="color: #848484;">12￥</h6>
									</button>&nbsp;&nbsp;</a>
									<a href="menber.php?money=24&time=5"><button onclick="fun3()" class="b3">
										半年
										<h6 style="color: #848484;">24￥</h6>
									</button></a>&nbsp;&nbsp;
									<a href="menber.php?money=48&time=12"><button onclick="fun4()" class="b4">
										一年
										<h6 style="color: #848484;">48￥</h6>
									</button></a>
								</div>	
							</div>
							<div class="payment">
								<img src="../image/pay1.jpg">
								<div class="payment-info" style="position: inherit;left: 160px; top: 0px;">
									<h2 class="mon1">￥6.00</h2>
									<h2 class="mon2" style="display:none ;">￥12.00</h2>
									<h2 class="mon3" style="display:none ;">￥24.00</h2>
									<h2 class="mon4" style="display:none ;">￥48.00</h2>
									<h5>微信，支付宝，qq扫码付款</h5>
									<a href="#"><img src="../image/pay2.jpg" style="height: 30px; width: 30px;"/></a>
									<a href="#"><img src="../image/pay3.jpg" style="height: 30px; width: 30px;"/></a>
									<a href="#"><img src="../image/pay4.jpg" style="height: 30px; width: 30px;"/></a>
									<button style="width: 100px; height: 40px; color: #FFFFFF; background-color: #3ca4ff;border: none; position: inherit; top: 140px; left:0px; border-radius: 4px;">前往收银台</button>
								</div>
							</div>
							
					</div>
					
                </div>
			</div>
		</div>
		<div class="footer" style="width: 1000px; height: 100px; position: absolute; top: 760px;">
			
		</div>
			
	</body>
</html>
<script type="text/javascript">
	function del1() {
		$('.rightSide_learn').css("display",'block');
		$('.rightSide_info').css("display",'none');
		$('.rightSide_msg').css("display",'none');
		$('.rightSide_charge').css("display",'none');
	}
	function del2() {
		$('.rightSide_info').css("display",'block');
		$('.rightSide_learn').css("display",'none');
		$('.rightSide_msg').css("display",'none');
		$('.rightSide_charge').css("display",'none');
	}
	function del3() {
		$('.rightSide_msg').css("display",'block');
		$('.rightSide_info').css("display",'none');
		$('.rightSide_learn').css("display",'none');
		$('.rightSide_charge').css("display",'none');
	}
	function del4() {
		$('.rightSide_charge').css("display",'block');
		$('.rightSide_msg').css("display",'none');
		$('.rightSide_info').css("display",'none');
		$('.rightSide_learn').css("display",'none');
	}
	
	function fun1(){
		$('.b1').css("border-color","#72d5ff");
		$('.b2').css("border-color","#e6e6e6");
		$('.b3').css("border-color","#e6e6e6");
		$('.b4').css("border-color","#e6e6e6");
		$('.mon1').css("display",'block');
		$('.mon2').css("display",'none');
		$('.mon3').css("display",'none');
		$('.mon4').css("display",'none');
	}
	function fun2(){
		$('.b2').css("border-color","#72d5ff");
		$('.b1').css("border-color","#e6e6e6");
		$('.b3').css("border-color","#e6e6e6");
		$('.b4').css("border-color","#e6e6e6");
		$('.mon2').css("display",'block');
		$('.mon1').css("display",'none');
		$('.mon3').css("display",'none');
		$('.mon4').css("display",'none');
	}
	function fun3(){
		$('.b3').css("border-color","#72d5ff");
		$('.b1').css("border-color","#e6e6e6");
		$('.b2').css("border-color","#e6e6e6");
		$('.b4').css("border-color","#e6e6e6");
		$('.mon3').css("display",'block');
		$('.mon2').css("display",'none');
		$('.mon1').css("display",'none');
		$('.mon4').css("display",'none');
	}
	function fun4(){
		$('.b4').css("border-color","#72d5ff");
		$('.b1').css("border-color","#e6e6e6");
		$('.b3').css("border-color","#e6e6e6");
		$('.b2').css("border-color","#e6e6e6");
		$('.mon4').css("display",'block');
		$('.mon2').css("display",'none');
		$('.mon3').css("display",'none');
		$('.mon1').css("display",'none');
	}
	

	
</script>
<script>
	var imageInput = document.querySelector('#imageInput');
	
	    imageInput.onchange = function () {
	        var file = this.files[0];
	        if (!/image\/\w+/.test(file.type)) {/*可以把autio改成其他文件类型 比如 image*/
	              alert("只能选择图片文件")
	            return false;
	        }
	        console.log(file.type)/*文件类型*/
	        var reader = new FileReader();
	        reader.readAsDataURL(file);
	        reader.onload = function () {
	             var audioBlob=convertBase64UrlToBlob(reader.result,file.type)
	            /*request("audio",audioBlob)这里是我的ajax请求*/
	        };
	    };
	    
	     function convertBase64UrlToBlob(urlData,type){   /*转成二进制对象*/
	    var bytes=window.atob(urlData.split(',')[1]);      
	    var ab = new ArrayBuffer(bytes.length);  
	    var ia = new Uint8Array(ab);  
	    for (var i = 0; i < bytes.length; i++) {  
	        ia[i] = bytes.charCodeAt(i);  
	    }  
	    return new Blob( [ab] , {type : type});  
	    
	} 
	function request(type,Blob){
	 var formData = new FormData();/*创建formData对象*/
	
	   formData.append("cover_img", Blob);
	    $.ajax({
	            url:"文件上传地址",
	            type:"POST",
	            processData: false,
	            contentType: false,
	            data: formData,
	            dataType: 'json',
	            success: function (data) {
	
	                  }
	
	})
	
	}
</script>