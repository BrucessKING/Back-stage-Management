<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>留言板</title>
	<script type="text/javascript">
		var myDate = new Date();
		var year=myDate.getFullYear();        //获取当前年
		var month=myDate.getMonth()+1;   //获取当前月
		var day=myDate.getDate();            //获取当前日
		var now_time = year+'-'+month+'-'+day;
		//alert(now_time);
		$("#sub").on("click", function(){
			var formData = new FormData();
			var nickname=$("input[name=nickname]").val();
			var content=$("textarea[name=content]").val();
			var email=$("input[name=email]").val();
			formData.append("nickname",nickname);
			formData.append("content",content);
			formData.append("email",email);
			formData.append("now_time",now_time);
			if(nickname=="" || content=="" || email=="")
				alert("不能为空！");
			else{
				$.ajax({
					//async:false,//false为同步请求，当前请求未完成可能会锁死浏览器
					url:"addMessage.php",
					type:"POST",
					processData:false,
					contentType:false,
					data:formData,
					dataType:"text",
					success:function(data){
						console.log(data);
						alert("success");
						$('a[href="Message_Board.php"]').click();//刷新页面
					}
				});
			}
		});
	</script>
	<style type="text/css">
		.d{
			margin-top: 2%;
			margin-left: 5%;
			margin-right: 5%;
			background-color: rgb(218,244,205);
		}
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<?php 
		$con = @mysql_connect("localhost","root","");
		mysql_query("set names 'utf8'");//解决中文乱码问题
		if($con){
			mysql_select_db("student_manage");
			$sql = "select * from message_board order by `楼` ASC";
			$result = mysql_query($sql);
			$columns=mysql_num_fields($result);
			while($row=mysql_fetch_row($result)){
				echo '<div class="d" style="margin-top:1%"><div style="background-color: rgb(55,162,113);"><p style="text-align: right;">'.$row[0].mysql_field_name($result, 0).'</p></div><p>'.$row[3].'</p><a href="">'.'<pre style="text-align: right;">'.mysql_field_name($result, 1).$row[1].'</a><a href="">'.'    '.mysql_field_name($result, 4).$row[4].'</a></pre></div>';
			}
		}
		mysql_close($con);
	?>


	<div class="d">
		<form>
			<input type="text" name="nickname" placeholder="留言者昵称"><br />
			<input type="text" name="email" placeholder="留言者邮箱"><br />
			<textarea name="content" rows="5" cols="50" placeholder="留言内容"></textarea><br />
			<input type="button" name="button" id="sub" value="提交">
		</form>
	</div>
</body>
</html>