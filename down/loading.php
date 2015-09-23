<?php
$id = $_GET['id'];
$urlpar = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"]; //获取当前的url
header( "HTTP/1.1 301 Moved Permanently" ) ;
switch($id){
	case '113':
	header("Location:/360.html");
	break;
	case '199':
	header("Location:/389.html");
	break;
	default:
	header("Location:/");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>正在加载。。。</title>
</head>
<body>
正在加载请稍后。。。
</body>
</html>