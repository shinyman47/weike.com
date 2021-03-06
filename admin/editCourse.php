<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>修改课程</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
		<div class="main">
			<div class="head">
				<h1>修改课程</h1>
			</div>
			<div class="listwarp">
				
				<div class="list">
					<table border="1" cellpadding="6" cellspacing="0" style="background-color: #f1f1f1; font-size: 20px;">
					    <tr>
					        <th>修改课程</th>
					   
					    </tr>
					    
					    <tr>
					        <td>课程名</td>
					        <td style="width: 300px;">
					        	<input type="text"  value="" style="height: 30px; width: 350px;"/>
					        </td>
					    </tr>
					
						<tr>
						    <td>课程起始时间</td>
						    <td style="width: 300px;">
						    	<input type="date" value="" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>课程结束时间</td>
						    <td style="width: 300px;">
						    	<input type="date" value="" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>是否需要会员</td>
						    <td style="width: 300px;">
								<input type="radio" name="sex" value="male">是<br>
								<input type="radio" name="sex" value="female">否
							</td>
						</tr>
						
						<tr>
						    <td>授课教师</td>
						    <td style="width: 300px;">
						    	<input type="text" value="" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>课程标签</td>
						    <td style="width: 300px;">
						    	<input list="option" type="text" value="" style="height: 30px; width: 350px;"/>
								<datalist id="option">
								  <option value="生活类">
								  <option value="技术类">
								  <option value="教育类">
								  <option value="语言类">
								  <option value="健康类">
								</datalist>
						    </td>
						</tr>
						<tr>
						    <td>课程图片</td>
						    <td style="width: 300px;">
						    	<input type="file" id="imageInput" value="选择图片" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>上传视频</td>
						    <td style="width: 300px;">
						    	<input type="file" id="videoInput" value="选择视频" style="height: 30px; width: 350px;"/>
						    </td>
						</tr>
						<tr>
						    <td>课程简介</td>
						    <td style="width: 300px;">
						    	<textarea type="text" value="" style="height: 80px; width: 350px; "/>
								</textarea>
						    </td>
						</tr>
						
					</table>
				</div>
			</div>
			<div class="btnwarp">
				<div class="btn">
					<button>
						提交
					</button>
					<button>
						返回
					</button>
				</div>
			</div>
		</div>
	</body>
</html>
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
