<?php
	include('conn.php');
	$id = $_POST['id'];
	$content = $_POST['content'];
	$A = $_POST['A'];
	$B = $_POST['B'];
	$C = $_POST['C'];
	$D = $_POST['D'];
	$R = $_POST['R'];
	mysql_query("insert into dxt values('$id','$content','$A','$B','$C','$D','$R')");
	
	echo ("<a href=\"show.php\">查看出题</a>");
	echo ("<a href=\"1.html\">继续出题</a>");
?>