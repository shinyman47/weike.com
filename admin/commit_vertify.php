<?php
        include_once ("../conn/conn.php");
        $id=$_GET["id"];
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="list-commit">
			
			<div class="user-form-wrap" style="">
				<div class="register-form">
					<form action="edit/pass.php" method="get" style="text-align: center; overflow-y: scroll;">
                        <?php $sql="select * from mark WHERE Id=$id";
                        $result=mysqli_query($conn,$sql);
                        $info=mysqli_fetch_array($result);
                        ?>
						<h3 style="text-align: center;"><?php echo $info['mark']?></h3> <br>
                        <input type="hidden"  name="id" value="<?php echo $id?>">

						<input type="submit" class="sub" value="通过" style="width: 200px;"/>
						&nbsp;</form>
					<a href="commit.php"><button type="button" class="del1">x</button></a>
				</div>
			</div>
			<div class="cover" style="display:none;"></div>
		</div>
	</body>
</html>
