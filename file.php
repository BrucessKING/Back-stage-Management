<!DOCTYPE html>
<html>
<head>
	<title>文件上传</title>
	<meta charset="utf-8">
	<script type="text/javascript">
		$(function(){
			$("#choosePic").on("change", function(){
				$("#filename").text(this.files[0].name);
				var imgFile = this.files[0];
				var fr = new FileReader();
				fr.readAsDataURL(imgFile);
				//onload作用：文件读取成功完成时触发
				fr.onload = function(){
					$("#demo1").attr("src",fr.result);
				};
			});
			$("#up").on("click", function(){
				var formData = new FormData();
				var picFile = $("input[id=choosePic]")[0].files[0];//JQuery对象转换成DOM对象
				formData.append("picFile",picFile);
				//alert(formData.get("picFile"));
				$.ajax({
					//async:false,//false同步请求，当前请求未完成将会锁死浏览器
					url: "saveFile.php",
					type:"POST",
					data:formData,
					//cache:false,//文件上传，不要缓存之前的文件
					//不处理数据为查询字符串
					processData:false,
					//不使用默认的"application/x-www-form-urlencoded"
					contentType:false,
					dataType:"text",
					success:function(data){
						console.log(data);
						alert("修改成功");
						var picSrc = $("#demo1").attr("src");
						$("#picture").attr("src",picSrc);
					}
				});
			});
		});
	</script>
</head>
<body>
<!-- <form action="file.php" enctype="multipart/form-data" method="POST">
	<input type="file" name="file"><br />
	<input type="submit" name="submit">
</form> -->

<div style="margin-top: 10%;margin-left: 30%;">
	<input type="text" name="username" value="admin" style="cursor:not-allowed" disabled="disabled" class="layui-input"></br>
	<input type="password" name="password" value="******" style="cursor:not-allowed" disabled="disabled" class="layui-input"></br>

	<div class="file-container" style="display:inline-block;position:relative;overflow: hidden;vertical-align:middle">
		<button type="button" class="layui-btn">上传图片</button>
		<input type="file" id="choosePic" style="position:absolute;top:0;left:0;font-size:34px; opacity:0" accept=".png,.jpeg,.jpg,.gif">
	</div><span id="filename">未上传文件</span><br>
	<?php 
		$ini = @parse_ini_file("config.ini");
		$con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
	    mysql_query("set names 'utf8'");
	    if($con){
	    	mysql_select_db($ini["dbname"]);
	    	$sql = "select * from admin";
	    	$result = mysql_query($sql);
	    	while ($row = mysql_fetch_row($result)) {
	    		echo '<img class="layui-upload-img" id="demo1" src="'.$row[2].'" style="border-radius: 30px;width:60px;height:60px;">';
	    	}
	    }
	    mysql_close();
	?>
		<!-- <img class="layui-upload-img" id="demo1" src="upload/admin.jpg" style="border-radius: 30px;width:60px;height:60px;"> -->
		<p id="demoText"></p>
	<button type="button" class="layui-btn" id="up">确定</button>
</div>
</body>
</html>