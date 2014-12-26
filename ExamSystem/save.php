<?php
	include('conn.php');
	$x=$_REQUEST['x'];
	$t=$_REQUEST['t'];
	$j=$_REQUEST['j'];
	$ax=array();
	$ax=explode(",",$x);
	$at=array();
	$at=explode(",",$t);
	$aj=array();
	$aj=explode(",",$j);
	echo ("<br>");
	print_r($ax);
	echo ("<br>");
	print_r($at);
	echo ("<br>");
	print_r($aj);
	mysql_query("insert into paper(ntime,x,t,j) values(now(),'$x','$t','$j')");
?>