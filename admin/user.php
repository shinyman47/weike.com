<?php
include_once ("../conn/conn.php");
error_reporting(0);
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
			<div class="searchUser">
				<div class="search-warp" style="float: right;">
					<div class="search">
						<form action="" method="get">
                            <input type="text" class="content" name="search" placeholder="   查询用户名"/>
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
		<div class="list-warp" style="padding-top: 50px;">
			<div class="list">
				</br>
                <form action="delete/delete_user.php" method="get">
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
						勾选
						</th>
				    </tr>
                    <?php
                    $search="";
                    $search = $_GET['search'];
                    $sql="SELECT * FROM tb_user WHERE username LIKE '%" .$search . "%'";
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
                    $sql3="select * from tb_user WHERE username LIKE '%" .$search . "%' order by ID asc limit  ".($page-1)*$pagesize.",$pagesize ";
                    $result1=mysqli_query($conn,$sql3);
                    if (!$result1) {
                        printf("Error: %s\n", mysqli_error($conn));}
                    while($info=mysqli_fetch_array($result1)){
                    ?>
                    <tr>
                        <th><?php echo $info["ID"];?></th>
                        <th><?php echo $info["username"];?></th>
                        <th><?php echo $info["pwd"];?></th>
                        <th><?php echo $info["qq"];?></th>
                        <th><?php echo $info["que"];?></th>
                        <th><?php echo $info["aws"];?></th>
                        <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" value=<?php echo $info['ID'];?> name="<?php echo $info['ID'];?>"> </div></td>
                        <?php
                        }
                        ?>
				    </tr>
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
                        <a href="user.php?page=1" title="首页"><font face="webdings"> 9 </font></a> / <a href="user.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
                        <?php
                    }
                    for($i=1;$i<=$pagecount;$i++){
                        ?>
                        <a href="user.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                        <?php
                    }?>
                    <?php if($page<$pagecount){?>
                        <a href="user.php?page=<?php echo $page+1;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="user?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
                        <?php
                    }?>
                </td>
            </tr>
        </table>
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