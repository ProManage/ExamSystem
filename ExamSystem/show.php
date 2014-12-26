<?php
	include('conn.php');
?>
<html>
<body>
	<form action="check.php" method='get'>
        <?php
			$result=mysql_query("select id,content,a,b,c,d from dxt;");
			$num=-1;
			while ($row=mysql_fetch_array($result)){
				$num++;
		?>
				<P><?php echo $row["content"] ?></P>
				<input type='radio' name='q<?php echo $num ?>' value='a' />A:<?php echo $row["a"] ?>
				<input type='radio' name='q<?php echo $num ?>' value='b' />B:<?php echo $row["b"] ?>
				<input type='radio' name='q<?php echo $num ?>' value='c' />C:<?php echo $row["c"] ?>
				<input type='radio' name='q<?php echo $num ?>' value='d' />D:<?php echo $row["d"] ?>
		<?php
			}
		?>
		<br>
        <input type='submit' name='sub' value='提交试卷'>
    </form>
</body>
</html>