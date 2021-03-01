<?php
include_once ("../conn/conn.php");
error_reporting(0);
?>

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
		
			<div class="searchCourse">
				
				<div class="search-warp" style="float: right;">
					<div class="search">
						<form action="" method="get">
                            <input type="text" class="content" name="search" placeholder="   查询课程名"/>
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
		<div class="list-warp" style="padding-top: 60px;">
			<div class="list">
				</br>
				<table style="margin: 0 auto;">
					<tr>
						<th>用户数据</th>
					</tr>
				</table></br>
                <form method="get" action="delete/delete_course.php">
				<table border="1" cellpadding="10" cellspacing="">
				    <tr>
				        <th>课程ID</th>
				        <th>课程名</th>

						<th>课程简介</th>
                        <th>课程分类</th>
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
                        <th>修改课程</th>
                        <th>勾选</th>
				    </tr>
                    <?php
                    $search="";
                    $search = $_GET['search'];
                    $sql="SELECT * FROM lesson_p WHERE lesson_name LIKE '%" .$search . "%'";
                    $result = mysqli_query($conn, $sql);
                    $total = mysqli_num_rows($result);

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
                    $sql3="select * from lesson_p WHERE lesson_name LIKE '%" .$search . "%' order by Id asc limit  ".($page-1)*$pagesize.",$pagesize ";
                    $result1=mysqli_query($conn,$sql3);
                    if (!$result1) {
                        printf("Error: %s\n", mysqli_error($conn));}
                    while($info=mysqli_fetch_array($result1)) {
                        ?>
                        <tr>
                            <th><?php echo $info["Id"] ?></th>
                            <th><?php echo $info["lesson_name"] ?></th>
                            <th><?php echo $info["introduction"] ?></th>
                            <th><?php echo $info["class"] ?></th>
                            <th><?php echo $info["grade"] ?></th>
                            <th><?php echo $info["time_b"] ?></th>
                            <th><?php echo $info["time_e"] ?></th>
                            <th><?php echo $info["mon"] ?></th>
                            <th><?php echo $info["people_num"] ?></th>
                            <th><?php echo $info["teacher"] ?></th>
                            <th><a href="editCourse.php?Id=<?php echo $info[">修改课程</a></th>
                            <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" value=<?php echo $info['Id'];?> name="<?php echo $info['Id'];?>"> </div></td>
                            </th>
                        </tr>
                        <?php
                    }
                    ?>
                </table>


                    <tr>
                        <td height="20" bgcolor="#FFFFFF"><div align="center"></div></td>
                        <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="submit" value="删除所选" class="buttoncss"></div></td>
                    </tr>
                </form>
			</div>
		</div>
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
                        <a href="course.php?page=1" title="首页"><font face="webdings"> 9 </font></a> / <a href="course.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
                        <?php
                    }
                    for($i=1;$i<=$pagecount;$i++){
                        ?>
                        <a href="course.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                        <?php
                    }?>
                    <?php if($page<$pagecount){?>
                        <a href="course.php?page=<?php echo $page+1;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="course.php?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
                        <?php
                    }?>
                </td>
            </tr>
        </table>

		<div class="cover" style="display:none;"></div>






	</body>
</html>
