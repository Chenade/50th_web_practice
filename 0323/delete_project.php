<?php 
include('connect.php');

	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

?>

<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>EDIT PROJECT</h1>
		<br>
		<form action="delete_project2.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			專案名稱 :<?php echo $row['name'];?><br><br>
			專案說明： <?php echo $row['detail'];?><br>
			
			
			<h3>專案成員</h3>
			
			<?php 
				echo '目前專案名單：' .$row['leader'] .'(組長),' . $row['member'];
			?>
			
			
			<hr>
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>