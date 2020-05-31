<?php

	include('connect.php');
	
	
	$sql_side = 'SELECT * FROM `'.$_GET['project'].'` WHERE `no` = "'.$_GET['no'].'"';
	$run_side = mysqli_query($con,$sql_side);
	$row = mysqli_fetch_assoc($run_side);
	
?>

<!doctype HTML5>
<html>

<body align="center">
	
	

	<form action="side_delete2.php" method="post">
		<input type="hidden" name="project" value="<?php echo $_GET['project']; ?>">
		<input type="hidden" name="no" value="<?php echo $_GET['no']; ?>">
		標題：<input type="text" name="title" value="<?php echo $row['side_name']; ?>"><br><br>
		說明：<input type="text" name="detail" value="<?php echo $row['side_detail']; ?>">><br><br>
		<br><br>	
		<input type = "hidden" name="side" value= "sent">
		<input type="submit">
	
	</form>
	
	
	
</body>

</html>