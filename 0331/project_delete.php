<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
?>


<!doctype HTML5>

<head></head>

<body align="center">

	<form action="project_delete2.php" method="post">
		
		<input type='hidden' name="id" value="<?php echo $row['id'];?>">
		名稱：<?php echo $row['name'];?><br>
		內容：<?php echo $row['detail'];?><br>
		組長：  <?php echo $row['leader'];?> <br>
		組員名單： <?php echo $row['member'];?><br>
		
		
		<br><br>
		<input type="submit">
		
	</form>

	<br><button onclick=location.href='projectlist.php'>BACK</button><br><br>
</body>