<?php
	$nickname = @$_POST['nickname'];
	$email = @$_POST['email'];
	$content = @$_POST['content'];
	$now_time = @$_POST['now_time'];
	$ini= @parse_ini_file("config.ini");
    $con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
	if($con){
		mysql_query("set names 'utf8'");//解决中文乱码问题
		mysql_select_db($ini["dbname"]);
		$sql1 = "select count(*) from message_board";
		$result = mysql_query($sql1);
		$floor = mysql_fetch_row($result)[0] + 1;
		$sql = "insert into message_board values($floor,\"$nickname\",\"$email\",\"$content\",\"$now_time\")";
		mysql_query($sql);
	}

?>