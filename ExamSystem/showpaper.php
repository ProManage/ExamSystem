<?php
	include('conn.php');
?>
<html>
	<head>
		<style>
			.xzt{
				width: 500px;
				height: auto;
				border: 1px solid #BBBBBB;
				border-top: 0px;
			}
			.tkt{
				width: 500px;
				height: auto;
				border: 1px solid #BBBBBB;
				border-top: 0px;
			}
			.jst{
				width: 500px;
				height: auto;
				border: 1px solid #BBBBBB;
				border-top: 0px;
			}
		</style>
	</head>
	<body>
		<?php
			$result=mysql_query("select pid,ntime,x,t,j from paper;");
			$num=-1;
			while ($row=mysql_fetch_array($result)){
				$num++;
		?>
				<div style="margin-left:450px; width:500px; height:auto;">
					<div style="width:500px; height:100px; border:1px solid #BBBBBB;">
						<div style="width:500px; height:50px; margin-top: -10px; border-bottom: 1px solid #BBBBBB; background-color: #efefef;">
							<p style="margin-left: 180px; font-size: 30px; margin-top: 10px; font-weight:bold; ">
								第<?php echo $row["pid"]?>份试卷
							<p>
						</div>
						<p style="margin-left: 300px;">
							组卷时间&nbsp;&nbsp;<?php echo $row["ntime"]?>
						</p>
					</div>
					<?php
						$ax=array();
						$ax=explode(",",$row["x"]);
						$at=array();
						$at=explode(",",$row["t"]);
						$aj=array();
						$aj=explode(",",$row["j"]);
					?>
					<div class="xzt">
						<div style="background-color: #E2F773; margin-top: -16px;">
							<p>
								选择题:
							</p>
						</div>
						<div>
							<?php
								for ($i=1;$i<count($ax);$i++){
									$resultx=mysql_query("select id,content,a,b,c,d from dxt where id='$ax[$i]'");
									$rowx=mysql_fetch_array($resultx)
							?>
								<div>
									<div style="width:500px; background:#efefef;">
										<p style="width:499px; border:1px solid #BBBBBB;">
											题号:<?php echo $i ?> <?php echo $rowx["content"] ?>
										</p>
										<!--
										<input type='checkbox' name='ckbx_x[]' value='<?php echo $row[$i] ?>' style="position:absolute; margin-left:480px; margin-top:-32px;"/>
										-->
									</div>
									<input type='radio' name='q<?php echo $ax[$i] ?>' value='a' />A:<?php echo $rowx["a"] ?>
									<input type='radio' name='q<?php echo $ax[$i] ?>' value='b' />B:<?php echo $rowx["b"] ?>
									<input type='radio' name='q<?php echo $ax[$i] ?>' value='c' />C:<?php echo $rowx["c"] ?>
									<input type='radio' name='q<?php echo $ax[$i] ?>' value='d' />D:<?php echo $rowx["d"] ?>
								</div>
							<?php
								}
							?>
						</div>
					</div>
					<div class="tkt">
						<div style="background-color: #E2F773; margin-top: -16px;">
							<p>
								填空题:
							</p>
						</div>
						<div>
							<?php
								for ($i=1;$i<count($at);$i++){
									$resultt=mysql_query("select id,content,a,b,c,d from dxt where id='$at[$i]'");
									$rowt=mysql_fetch_array($resultt)
							?>
								<div>
									<div style="width:500px; background:#efefef;">
										<p style="width:499px; border:1px solid #BBBBBB;">
											题号:<?php echo $i ?>
										</p>
									</div>
									<p>
										<?php echo $rowt["content"] ?>
									</p>
								</div>
							<?php
								}
							?>
						</div>
					</diV>
					<div class="jst">
						<div style="background-color: #E2F773; margin-top: -16px;">
							<p>
								计算题:
							</p>
						</div>
						<div>
							<?php
								for ($i=1;$i<count($aj);$i++){
									$resultj=mysql_query("select id,content,a,b,c,d from dxt where id='$aj[$i]'");
									$rowj=mysql_fetch_array($resultj)
							?>
								<div>
									<div style="width:500px; background:#efefef;">
										<p style="width:499px; border:1px solid #BBBBBB;">
											题号:<?php echo $i ?>
										</p>
									</div>
									<p>
										<?php echo $rowj["content"] ?>
									</p>
								</div>
							<?php
								}
							?>
						</div>
					</diV>
				</div>
		<?php
			}
		?>
	</body>
</html>