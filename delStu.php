<?php 
	$id = $_GET['id'];
    $token = $_GET['token'];
    $ini= @parse_ini_file("config.ini");
    $con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
    mysql_query("set names 'utf8'");//必须要，否则会因为中文问题无法删除
    if($con){
    	mysql_select_db($ini["dbname"]);
    	$sql = "delete from studentinfo where 学号='$id' and token='$token'";
    	mysql_query($sql);
    	echo '<script>alert("删除成功");</script>';
    }
    mysql_close();
?>