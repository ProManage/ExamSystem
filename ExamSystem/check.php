<?php
	include("conn.php");
	
	if(!empty($_GET)){
		$answer=array();
		$num=-1;
		$result=mysql_query("select r from dxt;");
		while ($row=mysql_fetch_array($result)){
			$num++;
			$answer[$num]=$row["r"];
		}
		$sum=0;
		for($i=0;$i<4;$i++){
			if(!empty($_GET['q'.$i])){
				if($_GET['q'.$i]==$answer[$i]){
					$sum+='10';
				}else{
					echo "第".($i+1)."题不正确！正确答案是".$answer[$i]."<br />";
				}
			}
		}
		echo "您的总得分为：".$sum;
	}
?>