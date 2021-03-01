<?php
session_start();
error_reporting(0);
$search=$_GET["search"];
$type=array("Id","grade","people_num");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="CSS1/header.css"/>
		<link rel="stylesheet" type="text/css" href="CSS1/main.css" />
		
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
								<a href="../index.php">shop</a>
							</li>
						<ul>
				</div>
				</div>
            <?php
            if(@ $_SESSION['username']=='') {
                ?>
                <div class="login-area">
                    <ul>
                        <li>
                            <a href="../log/login.php" onclick="login()">Sign In</a>
                        </li>
                    </ul>
                </div>
                <div class="register-area">
                    <ul>
                        <li>
                            <a href="../log/register.php" onclick="register()">Register</a>
                        </li>
                    </ul>
                </div>
                <?php
            }
            else {
                ?>
                <div class="username">
                	<a href="../user/user_interface.php" onclick="login()" style="float: right; font-size: 50px; padding-right: 35px; padding-top: 20px; color: #000000; ">  您好：<?php echo $_SESSION["username"]?></a>
                </div>
                <?php
            }
            ?>
				
			</div>
        <div class="main">
			<div class="search-warp">
				<div class="search">
					<form action="" method="get">
						<input type="text" class="content"  name="search" placeholder="Search our courses"/>
						<input type="submit" class="submit" value="Search"/>
                       <?php
                        include_once ("../conn/conn.php");
                        //接收搜索框中的内容
                        $search = $_GET['search'];
                        $total=0;
                        if($_GET['search']!="") {
                        $sql = "SELECT * FROM lesson_p WHERE lesson_name LIKE '%" .$_GET['search'] . "%'";
                        $result = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($result);}//获取查$result = mysqli_query($conn, $sql);询记录条数
                        ?>
						<div class="hotTags" style="position:absolute;top: 36px;right: 476px;color: #464646;">
							<span></span>
							<span></span>
						</div>
					</form>
				</div>
			</div>
            <?php
            if((@ $_GET['order'])==""){
            //$pagecount=intval($total/$pagesize);
            $order=0;
            //如果总数小于5则页码显示为1页；
            }else{
            $order=($_GET['order']);
            //如果大于5条则显示实际的总数；
            }
		    ?>
			<div class="search-warp-type">
				
				<div class="generalorder"style="padding-left: 20px; ">
                    <a href="search_interface.php?search=<?php echo $search;?>&amp;order=0" class="gengralorder-buttom">新鲜出炉</a>
                    <a href="search_interface.php?search=<?php echo $search;?>&amp;order=1" class="gengralorder-buttom">最高评分</a>
                    <a href="search_interface.php?search=<?php echo $search;?>&amp;order=2" class="gengralorder-buttom">最多参与</a>
                </div>
            </div>
            <div class="search-content">
                <?php
                if($search!="") {
                    $sql = "SELECT * FROM lesson_p WHERE lesson_name LIKE '%" .$search . "%'";
                    $result = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($result);
                    if($total==0){
                    echo "本站暂无搜索词条";
                    }
                    else {

                        $pagesize=5;
                        //设置每页显示5条记录；
                        if ($total<=$pagesize){
                            $pagecount=1;
                            //定义$pagecount初使变量为1页；
                        }
                        if(($total%$pagesize)!=0){
                            $pagecount=intval($total/$pagesize)+1;
                            //取页面统计总数为整数；
                        }else{
                            $pagecount=intval($total/$pagesize);
                        }
                        if((@ $_GET['page'])==""){
                            //$pagecount=intval($total/$pagesize);
                            $page=1;
                            //如果总数小于5则页码显示为1页；
                        }else{
                            $page=intval($_GET['page']);
                            //如果大于5条则显示实际的总数；
                        }
                        $sql1=mysqli_query($conn,"select * from lesson_p where lesson_name like '%". $search."%' order by $type[$order] asc limit  ".($page-1)*$pagesize.",$pagesize  ");?>
                        <ul class="courseslist">
                            <?php
                        while($info=mysqli_fetch_array($sql1))
                        {   ?>
                            <li class="course">
                            <a href="../courses/course_interface.php?lesson_id=<?php echo $info['Id'];?>" >
                            <img src="../image/lessonimg/<?php echo $info['address']; ?>">
                            </br>  <?php echo $info['lesson_name'] ;?>
                            </a>
                            </li>
                       <?php }?>

                            <?php }}?>
                </ul>
                <table width="583" border="0">
                    <tr>
                        <td>共有数据
                            <?php
                            echo $total;//显示总页数；
                            ?>
                            &nbsp;条，每页显示&nbsp;<?php echo $pagesize;//打印每页显示的总页码；?>&nbsp;条，&nbsp;第&nbsp;<?php echo $page;//显示当前页码；?>&nbsp;页/共&nbsp;<?php echo $pagecount;//打印总页码数 ?>&nbsp;页：
                            <?php
                            if($page>=2)
                                //如果页码数大于等于2则执行下面程序
                            {
                                ?>
                                <a href="search_interface.php?search=<?php echo $search;?>&page=1>&amp;order=<?php echo $order;?>" title="首页"><font face="webdings"> 9 </font></a> / <a href="search_interface.php?search=<?php echo $search;?>&amp;page=<?php echo $page-1;?>&amp;order=<?php echo $order;?>" title="前一页"><font face="webdings"> 7 </font></a>
                                <?php
                            }
                            for($i=1;$i<=$pagecount;$i++){
                                    ?>
                                    <a href="search_interface.php?search=<?php echo $search;?>&amp;page=<?php echo $i;?>&amp;order=<?php echo $order;?>"><?php echo $i;?></a>
                                    <?php
                            }?>
                            <?php if($page<$pagecount){?>
                                    <a href="search_interface.php?search=<?php echo $search;?>&amp;page=<?php echo $page+1;?>&amp;order=<?php echo $order;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="search_interface.php?search=<?php echo $search;?>&amp;page=<?php echo $pagecount;?>&amp;order=<?php echo $order;?>" title="尾页"><font face="webdings"> : </font></a>
                            <?php
                            }?>
                        </td>
                    </tr>
                </table>



			</div>
		</div>
		
		
		
		
	</body>
</html>

		
<script type="text/javascript">
	function teach(){
		$('.rightSide_teach').css("display",'block');
		$('.rightSide_learn').css("display",'none');
	}
	function del2() {
		$('.rightSide_teach').css("display",'none');
		$('.rightSide_learn').css("display",'block');
	}
</script>
