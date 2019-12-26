<!DOCTYPE html>
<html>
<head>
	<title>查询</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		$(function(){
			$("a[id=del]").on("click", function(event){//不能使用$("#del")，否则选不中所有对象，$("#del")选不中所有对象
				var delHref = this.getAttribute("href");
				event.preventDefault();
				$.ajax({
					url:delHref,
					type:"GET",
					success:function(){
						alert("sucess");
						$('a[href="search.php"]').click();
					}
				});
			});
		});
	</script>
</head>
<body>
	<?php
		$ini = @parse_ini_file("config.ini");
		$con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
		mysql_query("set names 'utf8'");//解决中文乱码问题
		if($con){
			mysql_select_db($ini["dbname"]);
			$sql = "select * from studentinfo";
			$result = mysql_query($sql);
			$sql1 = "select count(*) from studentinfo";
			$result1 = mysql_query($sql1);
			$count = mysql_fetch_row($result1)[0];
			echo "	<div style='margin-left:5%;margin-top:1%'><h3>学生信息-共".$count."人</h2>
		<table class='layui-table'>
		<thead>
		<tr>
			<th>".mysql_field_name($result, 0)."</th>
			<th>".mysql_field_name($result, 1)."</th>
			<th>".mysql_field_name($result, 2)."</th>
			<th>".mysql_field_name($result, 3)."</th>
			<th>".mysql_field_name($result, 4)."</th>
			<th>".mysql_field_name($result, 5)."</th>
		</tr>
		</thread>";
		while($row = mysql_fetch_row($result)){
			echo "
		<tbody>
		<tr>
			<td>".$row[0]."</td>
			<td>".$row[1]."</td>
			<td>".$row[2]."</td>
			<td>".$row[3]."</td>
			<td>"."<a class='layui-btn'>编辑(开发中)</a>"."</td>
			<td>"."<a id='del' class='layui-btn layui-btn-danger' href='delStu.php?id={$row[0]}&token=".md5('ABKing'.$row[0])."'>删除</a>"."</td>
		</tr>
		</tbody>";
		}
		mysql_close();
		echo "
		</table></div>
		";
		}
	?>
</body>
</html>