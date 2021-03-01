<?php
header("Content-Type: text/html;charset=utf-8");
include_once ("../conn/conn.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>添加课程</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="main">
			
			<div class="list-warp">
				<div class="list-warp-head">
					<button onclick="fun1()">
						添加课程
					</button>
					
					<button onclick="fun2()">
						添加视频
					</button>
					
					<button onclick="fun3()">
						添加题目
					</button>
				</div>
				<div class="list-main" style="margin: 0 auto;">
                    <form method="post" action="addCourse_do.php?type=1" name="upload_form" enctype="multipart/form-data">
					<table border="1" cellpadding="6" cellspacing="0" style="background-color: #f1f1f1; font-size: 20px;">
                        <tr>
                            <th>添加课程</th>

                        </tr>

                        <tr>
                            <td>课程名</td>
                            <td style="width: 300px;">
                                <input type="text"  name="name" value="" style="height: 30px; width: 350px;"/>
                            </td>
                        </tr>

                        <tr>
                            <td>课程起始时间</td>
                            <td style="width: 300px;">
                                <input type="date" value="" name="dateB" style="height: 30px; width: 350px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>课程结束时间</td>
                            <td style="width: 300px;">
                                <input type="date" value="" name="dateE" style="height: 30px; width: 350px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>是否需要会员</td>
                            <td style="width: 300px;">
                                <input type="radio" name="mon" value="1">是<br>
                                <input type="radio" name="mon" value="0">否
                            </td>
                        </tr>

                        <tr>
                            <td>授课教师</td>
                            <td style="width: 300px;">
                                <input type="text" value="" name="teacher" style="height: 30px; width: 350px;"/>
                            </td>
                        </tr>
                        <tr>
						    <td>课程标签</td>
						    <td style="width: 300px;">
						    	<input list="option" type="text" name="type" value="" style="height: 30px; width: 350px;"/>
								<datalist id="option"><?php
                                    $sql="select * from class";
                                    $result=mysqli_query($conn,$sql);
                                    while ($info=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php
                                    echo $info['typename']
                                    ?>"><?php
                                        }
                                      ?>

                                </datalist>
						    </td>
						</tr>
                        <tr>
                            <td>课程图片</td>
                            <td style="width: 300px;">
                                <input name="imgfile" type="file" accept="image/gif, image/jpeg"/>
                            </td>
                        </tr>

                        <tr>
                            <td>课程简介</td>
                            <td style="width: 300px;">
                                <textarea type="text" value="" name="jianjie" style="height: 80px; width: 350px; "/>
                                </textarea>
                            </td>
                        </tr>
						
					</table>
                        <div class="btnwarp">

                            <div class="btn">
                                <input type="submit" value="提交">

                            </div>
                        </div>
                    </form>
                    <a href="course.php"><button>
                            返回
                        </button></a>
				</div>
				<div class="list-video" style="display: none;">
                    <form action="addCourse_do.php?type=2&amp;lesson_id=<?php echo $_GET['lesson_id']?>" method="post" enctype="multipart/form-data">
					<table border="1" cellpadding="6" cellspacing="0" style="background-color: #f1f1f1; font-size: 20px;">
                        <input type="file" id="upload_imgs" name="upload_imgs[]" multiple="multiple">

                        <input type="submit" value="提交上传">
					</table>
                    </form>
                    <a href="course.php"><button>
                            返回
                        </button></a>
				</div>
				<div class="list-test" style="display: none;">
                    <form action="addtimu.php?lesson_id=<?php echo $_GET['lesson_id']?>" method="get" >
                        <input type="hidden" name="lesson_id" value="<?php
                        $id=$_GET['lesson_id'];
                        echo $id
                        ?>">
					<table border="1" cellpadding="1" cellspacing="0" style="background-color: #f1f1f1; font-size: 15px;">
			   
					    <tr>
					        <td>题目一</td>
					        <td style="width: 300px;">
					        	<input type="text"  name="tma" value="" style="height: 20px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>选项</td>
						    <td style="width: 250px;">
						    	A.<input type="text" name="aa" value="" style="height: 15px; width: 350px;"/>
								B.<input type="text" name="ab"value="" style="height: 15px; width: 350px;"/>
								C.<input type="text" name="ac"="" style="height: 15px; width: 350px;"/>
								D.<input type="text" name="ad"value="" style="height: 15px; width: 350px;"/>
								答案.
								<input type="radio" name="optiona" value="A">A
								<input type="radio" name="optiona" value="B">B
								<input type="radio" name="optiona" value="C">C
								<input type="radio" name="optiona" value="D">D
								
						    </td>
						</tr>
						
					</table>

					<table border="1" cellpadding="1" cellspacing="0" style="background-color: #f1f1f1; font-size: 15px;">
								   
					    <tr>
					        <td>题目二</td>
					        <td style="width: 300px;">
					        	<input type="text"  name="tmb" value="" style="height: 20px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>选项</td>
						    <td style="width: 250px;">
						    	A.<input type="text" name="ba"value="" style="height: 15px; width: 350px;"/>
								B.<input type="text" name="bb"value="" style="height: 15px; width: 350px;"/>
								C.<input type="text" name="bc"value="" style="height: 15px; width: 350px;"/>
								D.<input type="text" name="bd"value="" style="height: 15px; width: 350px;"/>
								答案.
								<input type="radio" name="optionb" value="A">A
								<input type="radio" name="optionb" value="B">B
								<input type="radio" name="optionb" value="C">C
								<input type="radio" name="optionb" value="D">D
								
						    </td>
						</tr>
						
					</table>
					&nbsp;
					<table border="1" cellpadding="1" cellspacing="0" style="background-color: #f1f1f1; font-size: 15px;">
								   
					    <tr>
					        <td>题目三</td>
					        <td style="width: 300px;">
					        	<input type="text" name="tmc" value="" style="height: 20px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>选项</td>
						    <td style="width: 250px;">
						    	A.<input type="text" name="ca" value="" style="height: 15px; width: 350px;"/>
								B.<input type="text" name="cb"value="" style="height: 15px; width: 350px;"/>
								C.<input type="text" name="cc"value="" style="height: 15px; width: 350px;"/>
								D.<input type="text" name="cd"value="" style="height: 15px; width: 350px;"/>
								答案.
								<input type="radio" name="optionc" value="A">A
								<input type="radio" name="optionc" value="B">B
								<input type="radio" name="optionc" value="C">C
								<input type="radio" name="optionc" value="D">D
								
						    </td>
						</tr>
						
					</table>
					<table border="1" cellpadding="1" cellspacing="0" style="background-color: #f1f1f1; font-size: 15px;position: inherit; left: 500px; top: 0px; float: right;">
								   
					    <tr>
					        <td>题目四</td>
					        <td style="width: 300px;">
					        	<input type="text" name="tmd" value="" style="height: 20px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>选项</td>
						    <td style="width: 250px;">
						    	A.<input type="text"name="da"value="" style="height: 15px; width: 350px;"/>
								B.<input type="text" name="db"value="" style="height: 15px; width: 350px;"/>
								C.<input type="text"name="dc" value="" style="height: 15px; width: 350px;"/>
								D.<input type="text" name="dd"value="" style="height: 15px; width: 350px;"/>
								答案.
								<input type="radio" name="optiond" value="A">A
								<input type="radio" name="optiond" value="B">B
								<input type="radio" name="optiond" value="C">C
								<input type="radio" name="optiond" value="D">D
								
						    </td>
						</tr>
						
					</table>
					<table border="1" cellpadding="1" cellspacing="0" style="background-color: #f1f1f1; font-size: 15px;position: inherit; left: 500px; top: 280px;">
								   
					    <tr>
					        <td>题目五</td>
					        <td style="width: 300px;">
					        	<input type="text" name="tme" value="" style="height: 20px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>选项</td>
						    <td style="width: 250px;">
						    	A.<input type="text" name="ea" value="" style="height: 15px; width: 350px;"/>
								B.<input type="text" name="eb" value="" style="height: 15px; width: 350px;"/>
								C.<input type="text" name="ec" value="" style="height: 15px; width: 350px;"/>
								D.<input type="text" name="ed" value="" style="height: 15px; width: 350px;"/>
								答案.
								<input type="radio" name="optione" value="A">A
								<input type="radio" name="optione" value="B">B
								<input type="radio" name="optione" value="C">C
								<input type="radio" name="optione" value="D">D
								
						    </td>
						</tr>
						
					</table>
                        <input type="submit" value="提交">
                    </form>
                    <a href="course.php"><button>
                            返回
                        </button></a>
				</div>
			</div>

		</div>
					
	</body>
</html>


<script>
	function fun1(){
		$('.list-main').css("display",'block');
		$('.list-video').css("display",'none');
		$('.list-test').css("display",'none');
	}
	function fun2(){
		$('.list-video').css("display",'block');
		$('.list-main').css("display",'none');
		$('.list-test').css("display",'none');
	}
	function fun3(){
		$('.list-test').css("display",'block');
		$('.list-main').css("display",'none');
		$('.list-video').css("display",'none');
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
<script>
	var videoInput = document.querySelector('#videoInput');
	
	    videoInput.onchange = function () {
	        var file = this.files[0];
	        if (!/video\/\w+/.test(file.type)) {/*可以把autio改成其他文件类型 比如 image*/
	              alert("只能选择视频文件")
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
