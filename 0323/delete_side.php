<?php
	
	include('connect.php');
	$sql = 'SELECT * FROM `'.$_GET['name'].'` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

?>
<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>DELETE SIDE</h1>
		<br>
		<form action="delete_side2.php" method="post">
			<input type="hidden" name="project" value="<?php echo $_GET['name']; ?>">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			
			面向名稱 : <?php echo $row['side'];?><br><br>
			面向說明：<?php echo $row['side_detail']; ?><br>
			
			<br><br>
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>