<?php
	include('conn.php');
	/*ѡ����*/
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
		echo ("��û��ѡ��ѡ����!<br>");
	}else{
		echo ("ѡ���⣺<br>ѡ�е�");
		for ($i=1;$i<=$num_x;$i++){
			echo (" ".$ckbx_x_id[$i]." ");
		}
		echo ("<br>");
		$tot_x+=$num_x*5;
		echo ("��ѡ��".$num_x."��,�ܼ�".($num_x*5)."��");
		echo ("<br>");
	}
	/*�����*/
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
		echo ("��û��ѡ�������!<br>");
	}else{
		echo ("����⣺<br>ѡ�е�");
		for ($i=1;$i<=$num_t;$i++){
			echo (" ".$ckbx_t_id[$i]." ");
		}
		echo ("<br>");
		$tot_t+=$num_t*10;
		echo ("��ѡ��".$num_t."��,�ܼ�".($num_t*10)."��");
		echo ("<br>");
	}
	/*������*/
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
		echo ("��û��ѡ�������!<br>");
	}else{
		echo ("�����⣺<br>ѡ�е�");
		for ($i=1;$i<=$num_j;$i++){
			echo (" ".$ckbx_j_id[$i]." ");
		}
		echo ("<br>");
		$tot_j+=$num_j*20;
		echo ("��ѡ��".$num_j."��,�ܼ�".($num_j*20)."��");
		echo ("<br>");
	}
	
	$tot=$tot_x+$tot_t+$tot_j;
	echo ("����ѡ����".$tot."�ֵ���Ŀ!");
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
					alert("�����������100��...");
					return false;
				}else if (tmp>100){
					alert("�������������100��...");
					return false;
				}else{
					alert("ȷ�ϱ����Ծ�?");
					window.location.href='save.php?x='+x+'&t='+t+'&j='+j;
					return false;
				}
			}
		</script>
	</head>
	<body>
		<?php echo $save_j; ?>
		<button onclick="return Chk(<?php echo $tot ?>,<?php echo json_encode($ax) ?>,<?php echo json_encode($at) ?>,<?php echo json_encode($aj) ?>);">�����Ծ�</button>
	</body>
</html>