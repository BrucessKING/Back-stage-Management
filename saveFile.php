<?php

$name = @$_FILES["picFile"]["name"];
$name = iconv('UTF-8','GBK',$name);
$names = explode(".", $name);
$postfix = $names[count($names)-1];
if($postfix=='jpg'||$postfix=='png'||$postfix=='gif'||$postfix=='jpeg'){
    $name = $names[0]."-".time().".".$postfix;
    $path = "upload/".$name;
    echo $path;
    if (@$_FILES["picFile"]["error"] > 0)
    {
        echo "错误：" . $_FILES["picFile"]["error"] . "<br>";
    }
    else
    {
        //echo "上传文件名: " . $_FILES["picFile"]["name"] . "<br>";
        //echo "文件类型: " . $_FILES["picFile"]["type"] . "<br>";
        //echo "文件大小: " . ($_FILES["picFile"]["size"] / 1024) . " kB<br>";
        //echo "文件临时存储的位置: " . $_FILES["picFile"]["tmp_name"];
    	//echo $name;
        move_uploaded_file(@$_FILES["picFile"]["tmp_name"], $path);
        $ini = @parse_ini_file("config.ini");
        $con = @mysql_connect($ini["servername"],$ini["username"],$ini["password"]);
        mysql_query("set names 'GBK'");
        if($con){
        	mysql_select_db($ini["dbname"]);
        	$sql = "update admin set img='".$path."' where username='"."admin'";
        	//echo $sql;
        	mysql_query($sql);
        }
        mysql_close();
    }
}
else{
    echo "error!";
}
?>