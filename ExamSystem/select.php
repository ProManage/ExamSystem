<?php
	include('conn.php');
	/*选择题*/
	$ckbx_x=$_POST['ckbx_x'];
	$ckbx_x_id=array();
	$num_x=-1;
	$save_x="0";
	$ax=array();
	for ($i=0;$i<count($ckbx_x);$i++){
		if (!is_null($ckbx_x[$i])){
			$num_x++;
			$ckbx_x_id[$num_x]=$ckbx_x[$i]+1;
			$save_x.=",";
			$save_x.=$ckbx_x[$i]+1;
			array_push($ax,$ckbx_x[$i]+1);
		}
	}
	$tot_x=0;
	if ($num_x==0){
		echo ("您没有选择选择题!<br>");
	}else{
		echo ("选择题：<br>选中第");
		for ($i=1;$i<=$num_x;$i++){
			echo (" ".$ckbx_x_id[$i]." ");
		}
		echo ("<br>");
		$tot_x+=$num_x*5;
		echo ("共选中".$num_x."题,总计".($num_x*5)."分");
		echo ("<br>");
	}
	/*填空题*/
	$ckbx_t=$_POST['ckbx_t'];
	$ckbx_t_id=array();
	$num_t=-1;
	$save_t="0";
	$at=array();
	for ($i=0;$i<count($ckbx_t);$i++){
		if (!is_null($ckbx_t[$i])){
			$num_t++;
			$ckbx_t_id[$num_t]=$ckbx_t[$i]+1;
			$save_t.=",";
			$save_t.=$ckbx_t[$i]+1;
			array_push($at,$ckbx_t[$i]+1);
		}
	}
	$tot_t=0;
	if ($num_t==0){
		echo ("您没有选择填空题!<br>");
	}else{
		echo ("填空题：<br>选中第");
		for ($i=1;$i<=$num_t;$i++){
			echo (" ".$ckbx_t_id[$i]." ");
		}
		echo ("<br>");
		$tot_t+=$num_t*10;
		echo ("共选中".$num_t."题,总计".($num_t*10)."分");
		echo ("<br>");
	}
	/*计算题*/
	$ckbx_j=$_POST['ckbx_j'];
	$ckbx_j_id=array();
	$num_j=-1;
	$save_j="0";
	$aj=array();
	for ($i=0;$i<count($ckbx_j);$i++){
		if (!is_null($ckbx_j[$i])){
			$num_j++;
			$ckbx_j_id[$num_j]=$ckbx_j[$i]+1;
			$save_j.=",";
			$save_j.=$ckbx_j[$i]+1;
			array_push($aj,$ckbx_j[$i]+1);
		}
	}
	$tot_j=0;
	if ($num_j==0){
		echo ("您没有选择计算题!<br>");
	}else{
		echo ("计算题：<br>选中第");
		for ($i=1;$i<=$num_j;$i++){
			echo (" ".$ckbx_j_id[$i]." ");
		}
		echo ("<br>");
		$tot_j+=$num_j*20;
		echo ("共选中".$num_j."题,总计".($num_j*20)."分");
		echo ("<br>");
	}
	
	$tot=$tot_x+$tot_t+$tot_j;
	echo ("您共选择了".$tot."分的题目!");
	echo ("<br>");
	echo ($save_x."<br>");
	echo ($save_t."<br>");
	echo ($save_j."<br>");
	
	echo ("<br>");
	print_r($ax);
	echo ("<br>");
	print_r($at);
	echo ("<br>");
	print_r($aj);
	echo ("<br>");
?>
<html>
	<head>
		<script>
			function Chk(score,x,t,j){
				//alert(score+" "+x.length+" "+t.length+" "+j.length);
				//return false;
				var tmp=score;
				if (tmp<100){
					alert("卷面分数不足100分...");
					return false;
				}else if (tmp>100){
					alert("卷面分数超过了100分...");
					return false;
				}else{
					alert("确认保存试卷?");
					window.location.href='save.php?x='+x+'&t='+t+'&j='+j;
					return false;
				}
			}
		</script>
	</head>
	<body>
		<?php echo $save_j; ?>
		<button onclick="return Chk(<?php echo $tot ?>,<?php echo json_encode($ax) ?>,<?php echo json_encode($at) ?>,<?php echo json_encode($aj) ?>);">保存试卷</button>
	</body>
</html>