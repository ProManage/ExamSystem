<?php
	include('conn.php');
?>
<html>
	<head>
		<script>
			function Check_all_x(obj,ckbx_x){
				var ckbxs=document.getElementsByName(ckbx_x); 
				for (var i=0;i<ckbxs.length;i++){
					ckbxs[i].checked = obj.checked;
				} 
			}
			function Check_all_t(obj,ckbx_t){ 
				var ckbxs=document.getElementsByName(ckbx_t); 
				for (var i=0;i<ckbxs.length;i++){
					ckbxs[i].checked = obj.checked;
				}
			}
			function Check_all_j(obj,ckbx_j){ 
				var ckbxs=document.getElementsByName(ckbx_j); 
				for (var i=0;i<ckbxs.length;i++){
					ckbxs[i].checked = obj.checked;
				}
			}				
		</script>
	</head>
	<body>
		<form name="" method="post" action="select.php">
			<div style="margin-left:450px; width:500px; height:auto; border:1px solid #BBBBBB;">
				<p>
					选择题:
					<p style="position: absolute; margin-top: -32px; margin-left: 397px; font-size: 12px; font-weight: bold;">
						全选/全不选
					</p>
					<input type="checkbox" name="all" style="position: absolute; margin-top: -32px; margin-left: 480px;" onclick="Check_all_x(this,'ckbx_x[]')" /> 
				</p>
				<input type="hidden" name="ckbx_x[]" value="-1"/>
				<?php
					$result=mysql_query("select id,content,a,b,c,d from dxt;");
					$num=-1;
					while ($row=mysql_fetch_array($result)){
						$num++;
				?>
					<div>
						<div style="width:500px; background:#efefef;">
							<p style="width:499px; border:1px solid #BBBBBB;">
								题号:<?php echo $num+1 ?> 
							</p>
							<input type='checkbox' name='ckbx_x[]' value='<?php echo $num ?>' style="position:absolute; margin-left:480px; margin-top:-32px;"/>
						</div>
						<p style="padding-left: 10px;">
							<?php echo $row["content"] ?>
						</p>
						<input type='radio' name='q<?php echo $num ?>' value='a' />A:<?php echo $row["a"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='b' />B:<?php echo $row["b"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='c' />C:<?php echo $row["c"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='d' />D:<?php echo $row["d"] ?>
					</div>
				<?php
					}
				?>
			</div>
			<div style="margin-top:30px; margin-left:450px; width:500px; height:auto; border:1px solid #BBBBBB;">
				<p>
					填空题 :
					<p style="position: absolute; margin-top: -32px; margin-left: 397px; font-size: 12px; font-weight: bold;">
						全选/全不选
					</p>
					<input type="checkbox" name="all" style="position: absolute; margin-top: -32px; margin-left: 480px;" onclick="Check_all_t(this,'ckbx_t[]')" /> 
				</p>
				<input type="hidden" name="ckbx_t[]" value="-1"/>
				<?php
					$result=mysql_query("select id,content,a,b,c,d from dxt;");
					$num=-1;
					while ($row=mysql_fetch_array($result)){
						$num++;
				?>
					<div>
						<div style="width:500px; background:#efefef;">
							<p style="width:499px; border:1px solid #BBBBBB;">
								题号:<?php echo $num+1 ?> 
							</p>
							<input type='checkbox' name='ckbx_t[]' value='<?php echo $num ?>' style="position:absolute; margin-left:480px; margin-top:-32px;"/>
						</div>
						<p style="padding-left: 10px;">
							<?php echo $row["content"] ?>
						</p>
						<input type='radio' name='q<?php echo $num ?>' value='a' />A:<?php echo $row["a"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='b' />B:<?php echo $row["b"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='c' />C:<?php echo $row["c"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='d' />D:<?php echo $row["d"] ?>
					</div>
				<?php
					}
				?>
			</div>
			<div style="margin-top:30px; margin-left:450px; width:500px; height:auto; border:1px solid #BBBBBB;">
				<p>
					计算题 :
					<p style="position: absolute; margin-top: -32px; margin-left: 397px; font-size: 12px; font-weight: bold;">
						全选/全不选
					</p>
					<input type="checkbox" name="all" style="position: absolute; margin-top: -32px; margin-left: 480px;" onclick="Check_all_j(this,'ckbx_j[]')" /> 
				</p>
				<input type="hidden" name="ckbx_j[]" value="-1"/>
				<?php
					$result=mysql_query("select id,content,a,b,c,d from dxt;");
					$num=-1;
					while ($row=mysql_fetch_array($result)){
						$num++;
				?>
					<div>
						<div style="width:500px; background:#efefef;">
							<p style="width:499px; border:1px solid #BBBBBB;">
								题号:<?php echo $num+1 ?>
							</p>
							<input type='checkbox' name='ckbx_j[]' value='<?php echo $num ?>' style="position:absolute; margin-left:480px; margin-top:-32px;"/>
						</div>
						<p style="padding-left: 10px;">
							<?php echo $row["content"] ?>
						</p>
						<input type='radio' name='q<?php echo $num ?>' value='a' />A:<?php echo $row["a"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='b' />B:<?php echo $row["b"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='c' />C:<?php echo $row["c"] ?>
						<input type='radio' name='q<?php echo $num ?>' value='d' />D:<?php echo $row["d"] ?>
					</div>
				<?php
					}
				?>
			</div>
			<input style="position:absolute; margin-top:30px; margin-left:910px;" type='submit' name='' value='提交'>
		</form>
	</body>
</html>