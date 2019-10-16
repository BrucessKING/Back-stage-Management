<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>后台管理</title>
	<link rel="stylesheet" href="upload/layui.css">
	<script type="text/javascript" src="upload/jquery-3.4.1.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#div0 a").on("click", function(event){
				var hrefSrc = this.getAttribute("href");
				//alert(hrefSrc);
				event.preventDefault();
				$('#div1').load(hrefSrc);
			});
		});
	</script>
</head>
<body>

	<div id="div0" style="width:200px;height:650px;float:left;background-color: rgb(62,66,79);">
	<?php 
		$ini = @parse_ini_file("config.ini");
		$con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
	    mysql_query("set names 'utf8'");
	    if($con){
	    	mysql_select_db($ini["dbname"]);
	    	$sql = "select * from admin";
	    	$result = mysql_query($sql);
	    	while ($row = mysql_fetch_row($result)) {
	    		echo '<img class="layui-upload-img" id="picture" src="'.$row[2].'" style="border-radius: 30px;width:60px;height:60px;">
    	<span style="color:#FFFFFF;"> '.$row[0].'</span>';
	    	}
	    }
	    mysql_close();
	?>
<!--     	<img class="layui-upload-img" id="picture" src="upload/admin.jpg" style="border-radius: 30px;width:60px;height:60px;">
    	<span style="color:#FFFFFF;"> Admin</span> -->
		<ul style="list-style: none;" class="layui-nav layui-nav-tree layui-inline">
			<li class="layui-nav-item"><a href="file.php">修改信息</a></li>
			<li class="layui-nav-item"><a href="search.php">查询</a></li>
			<li class="layui-nav-item"><a href="Message_Board.php">留言板</a></li>
		</ul>
	</div>
	<div id="div1" style="width:900px;height:600px;float:left;">
		
	</div>
</body>
</html>
