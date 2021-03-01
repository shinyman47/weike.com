<?php
session_start();
require_once('../conn/conn.php');
header("Content-Type: text/html;charset=utf-8");
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>订单管理</title>
		
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</head>
	<body>
    <div class="list-warp" style="padding-top: 50px;">
			<div class="list">
				</br>
				<table style="margin: 0 auto;">
					<tr>
						<th>订单数据</th>
					</tr>
				</table></br>
				<table border="1" cellpadding="30" cellspacing="">
				    <tr>
				        <th>订单ID</th>
				        <th>用户名</th>
						<th>充值时间</th>
						<th>充值时长</th>
						<th>充值金额</th>
						<th>到期时间</th>
						<th>
							
						</th>
						<th>
							
						</th>
				    </tr>
                    <?php
                    $sql="Select  * from member_p";
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
                    $sql3="select * from member_p order by time_b DESC limit  ".($page-1)*$pagesize.",$pagesize ";
                    $result1=mysqli_query($conn,$sql3);
                    if (!$result1) {
                        printf("Error: %s\n", mysqli_error($conn));}
                    while($info=mysqli_fetch_array($result1)) {
                        ?>

                        <tr>
                            <th><?php echo $info["Id"]; ?></th>
                            <th><?php echo $info["username"]; ?></th>
                            <th><?php echo $info["time_b"]; ?></th>
                            <th><?php echo $info["t"]; ?></th>
                            <th><?php echo $info["money"]; ?></th>
                            <th><?php echo $info["time_e"]; ?></th>
                        </tr>
                        <?php
                    }
                    ?>
				</table>
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
                                <a href="order.php?page=1" title="首页"><font face="webdings"> 9 </font></a> / <a href="order.php?page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 7 </font></a>
                                <?php
                            }
                            for($i=1;$i<=$pagecount;$i++){
                                ?>
                                <a href="order.php?page=<?php echo $i;?>"><?php echo $i;?></a>
                                <?php
                            }?>
                            <?php if($page<$pagecount){?>
                                <a href="order.php?page=<?php echo $page+1;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="order?page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> : </font></a>
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