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
			}
			.jst{
				width: 500px;
				height: auto;
				border: 1px solid #BBBBBB;
			}
		</style>
		<script>
			var hour=0,minute=0,second=0;
			var t=7200;
			var flag1;
			function studyTime()
			{
				document.getElementById('start').type="hidden";
				hour=parseInt(t/60/60);
				minute=parseInt(t/60%60);
				second=parseInt(t%60);
				document.getElementById('SECOND').innerHTML=second;
				document.getElementById('HOUR').innerHTML=hour;
				document.getElementById('MINUTE').innerHTML=minute;
				t=t-1;
				flag1 = setTimeout("studyTime()", 1000);           
			}
			//��ֹѧϰ��ʱ��
			function stopTime()
			{
				clearTimeout(flag1);
			}
		</script>
	</head>
	<body>
		<!--
		<input type="button" onclick="stopTime()" value="��ͣ">
		-->
		<div style="position:fixed; width:300px; height:30px; border:1px solid #BBBBBB;">
			<p style="margin-top:6px;">
				���뿼�Խ�������
				<span id="HOUR">2</span>Сʱ
				<span id="MINUTE">0</span>����
				<span id="SECOND">0</span>��
			</p>
		</div>
		<input id="start" type="button" style="position:fixed; margin-top:40px;" onclick="studyTime()" value="��ʼ">
		<?php
			$result=mysql_query("select pid,ntime,x,t,j from paper where pid=4");
			$num=-1;
			while ($row=mysql_fetch_array($result)){
				$num++;
		?>
			<form action="testsubmit.php" method='post'>
				<div style="margin-left:450px; width:500px; height:auto;">
					<div style="width:500px; height:100px; border:1px solid #BBBBBB;">
						<div style="width:500px; height:50px; margin-top: -10px; border-bottom: 1px solid #BBBBBB; background-color: #efefef;">
							<p style="margin-left: 180px; font-size: 30px; margin-top: 10px; font-weight:bold; ">
								��<?php echo $row["pid"]?>���Ծ�
							<p>
						</div>
						<p style="margin-left: 300px;">
							���ʱ��&nbsp;&nbsp;<?php echo $row["ntime"]?>
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
								ѡ����:
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
											���:<?php echo $i ?>
										</p>
										<!--
										<input type='checkbox' name='ckbx_x[]' value='<?php echo $row[$i] ?>' style="position:absolute; margin-left:480px; margin-top:-32px;"/>
										-->
									</div>
									<p style="padding-left: 10px;">
										<?php echo $rowx["content"] ?>
									</p>
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
					<div class="tkt" style="margin-top:50px;">
						<div style="background-color: #E2F773; margin-top: -16px;">
							<p>
								�����:
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
											���:<?php echo $i ?>
										</p>
									</div>
									<p style="padding-left: 10px;">
										<?php echo $rowt["content"] ?>
									</p>
								</div>
							<?php
								}
							?>
						</div>
					</diV>
					<div class="jst" style="margin-top:50px;">
						<div style="background-color: #E2F773; margin-top: -16px;">
							<p>
								������:
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
											���:<?php echo $i ?>
										</p>
									</div>
									<p style="padding-left: 25px;">
										<?php echo $rowj["content"] ?>
									</p>
									<div style="padding-left: 25px;">
										<textarea style="width:450px; height:100px; "></textarea>
									</div>
								</div>
							<?php
								}
							?>
						</div>
					</diV>
				</div>
				<input style="position:absolute; margin-top:30px; margin-left:910px;" type='submit' name='' value='����'/>
			</form>
		<?php
			}
		?>
	</body>
</html>