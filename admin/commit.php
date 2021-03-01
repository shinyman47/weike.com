
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

            <a href="commit.php?order=0" class="gengralorder-buttom">显示全部</a>
            <a href="commit.php?order=1" class="gengralorder-buttom">显示通过</a>
            <a href="commit.php?order=2" class="gengralorder-buttom">显示未通过</a>
			
			
		</div>
		<div class="list-warp">
			<div class="list">
				</br>
				<table style="margin: 0 auto;">
					<tr>
						<th>评论数据</th>
					</tr>
				</table></br>
                <form method="get" action="delete/delete_mark.php">
				<table border="1" cellpadding="30" cellspacing="">
				    <tr>
				        <th>课程id</th>
				        <th>用户名</th>
						<th>评论内容</th>
						
						<th>
							
						</th>
						<th>
							
						</th>
				    </tr>
                    <?php

                    if(@$_GET['order']==null){
                        $order=0;

                    }
                    $order=$_GET['order'];
                    if($order==0){
                        $sql="SELECT * FROM mark ORDER BY Id  ";
                    }
                    elseif($order==1){
                        $sql="select * from mark WHERE ys=1 order by Id ";
                    }
                    else{
                        $sql="select * from mark WHERE ys=0 order by Id";

                    }

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
                    if($order==0){
                    $sql3="select * from mark order by Id asc limit  ".($page-1)*$pagesize.",$pagesize ";}
                    elseif($order==1){
                        $sql3="select * from mark WHERE ys=1 order by Id asc limit  ".($page-1)*$pagesize.",$pagesize ";
                    }
                    else{
                        $sql3="select * from mark WHERE ys=0 order by Id asc limit  ".($page-1)*$pagesize.",$pagesize ";


                    }
                    $result1=mysqli_query($conn,$sql3);
                    if (!$result1) {
                    printf("Error: %s\n", mysqli_error($conn));}
                    while($info=mysqli_fetch_array($result1)) {
                        ?>
                        <tr>
                            <th><?php echo
                                $info["lesson_id"]
                                ?></th>
                            <th> <?php echo  $info["username"] ?></th>
                            <th><?php echo $info["mark"] ?></th>

                            <th>
                                <a href="commit_vertify.php?id=<?php echo $info['Id'];?>">
                                    查看评论
                                </a>
                            </th>
                            <td height="20" bgcolor="#FFFFFF"><div align="center"><input type="checkbox" value=<?php echo $info['Id'];?> name="<?php echo $info['Id'];?>"> </div></td>
                        </tr>
                        <?php
                    }
                    ?>


				</table>
                    <input type="submit" value="删除所选" class="buttoncss">
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
                        <a href="commit.php?page=1&amp;order=<?php echo $order;?>" title="首页"><font face="webdings"> 9 </font></a> / <a href="commit.php?page=<?php echo $page-1;?>&amp;order=<?php echo $order;?>" title="前一页"><font face="webdings"> 7 </font></a>
                        <?php
                    }
                    for($i=1;$i<=$pagecount;$i++){
                        ?>
                        <a href="commit.php?page=<?php echo $i;?>&amp;order=<?php echo $order;?>"><?php echo $i;?></a>
                        <?php
                    }?>
                    <?php if($page<$pagecount){?>
                        <a href="commit.php?page=<?php echo $page+1;?>&amp;order=<?php echo $order;?>" title="后一页"><font face="webdings"> 8 </font></a> <a href="commit.php?page=<?php echo $pagecount;?>&amp;order=<?php echo $order;?>" title="尾页"><font face="webdings"> : </font></a>
                        <?php
                    }?>
                </td>
            </tr>
        </table>
        <div class="cover" style="display:none;"></div>
	</body>
</html>
<script type="text/javascript">
	function del0() {
		$('.user-form-wrap').css("display",'block');
		$('.cover').css("display",'block');
	}
	function del1() {
		$('.user-form-wrap').css("display",'none');
		$('.cover').css("display",'none');
	}
</script>