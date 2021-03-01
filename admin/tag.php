<?php
include_once ("../conn/conn.php");
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="tag-main" style="height: 50%; width: 100%;">
			<div class="banner-warp" style="position: inherit; margin: 0 auto; height: 80%; width: 50%; background: #;">
				
					<div id="container" style="width:500px;margin: 0 auto;">
							 
							<div id="header" style="background-color:#f79d00;">
							<h2 style="margin-bottom:0;text-align: center;">类别管理</h2></div>
							 
							<div id="menu" style="background-color:#f3cb00;height:40px;width:300px;float:left; text-align: center;">
							<b>类别名称：</b><br>
							</div>



                                <div id="content" style="background-color:#f5f5f5;height:40px;width:200px;float:left;">
                                    <h3 style="margin-top: 0;">操作</h3>

                                </div>
                        <form action="delete/delete_tag.php" method="get">
                                <?php
                                $sql="select * from class ";
                                $result=mysqli_query($conn,$sql);
                                while ($info=mysqli_fetch_array($result)) {
                                    ?>
                                <div id="menu"
                                     style="background-color:#FFD700;height:40px;width:300px;float:left; text-align: center;">
                                    <b><?php
                                        echo $info['typename']
                                        ?></b>
                                        </input><br>
                                </div>

                                <div id="content" style="background-color:#d9d9d9;height:40px;width:200px;float:left;">

                                    <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" value=<?php echo $info['Id'];?> name="<?php echo $info['Id'];?>"> </div></td>

                                </div>
                                <?php
                            }
                        ?>
                            <tr>
                                <td height="20" bgcolor="#FFFFFF"><div align="center"></div></td>
                                <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="submit" value="删除选项" class="buttoncss"></div></td>
                            </tr>
                        </form>
							 
							
								
								
							</div>
							 
							<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
						</div>
					</div>
				
				
				
					<div id="container" style="width:500px;margin: 0 auto;">
					 
					<div id="header" style="background-color:#FFA500;">
					<h1 style="margin-bottom:0;text-align: center;">增加类别</h1></div>
					 
					<div id="menu" style="background-color:#FFD700;height:40px;width:100px;float:left; text-align: center;">
					<b>类别名称：</b><br>
					</div>
					 
					<div id="content" style="background-color:#EEEEEE;height:40px;width:400px;float:left;">
                        <form method="get" action="add_tag.php">
						<input type="text" name="class" id="" value="" style="height: 30px; width: 300px;"/>
						<input type="submit" value="添加类别"></form>
					</div>
					 
					<div id="footer" style="background-color:#FFA500;clear:both;text-align:center;">
				</div>
			</div>
			
		</div>
	</body>
</html>
