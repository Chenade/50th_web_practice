
<?php
	
	include('connect.php');
	
	$sql = 'SELECT * FROM `project` WHERE `id` ="'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

?>

<!doctype HTML5>
<html>

<body align="center">

	<form action="project_delete2.php" method ="post">
		<input type="hidden" name="id" value="<?php echo $row['id'];?>">
		專案名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
		專案說明：<input type="text" name="detail" value="<?php echo $row['detail'];?>"><br><br>
		組長：
		<?php
		
			
			
			$sql2 = 'SELECT * FROM `user`';
			$run2 = mysqli_query($con,$sql2);
			
			while($row2 = mysqli_fetch_Assoc($run2)){
				if($row['leader'] == $row2['name']){
					echo '<input type = "radio" name="leader" value="'.$row2['name'].'" checked>'.$row2['name'];
				}else{
					echo '<input type = "radio" name="leader" value="'.$row2['name'].'">'.$row2['name'];
				}
			}
		
		?>
		<br>
		
		組員： <?php echo $row['member'];?> <br>
		
		<input type="submit"><br><br>
	</form>

	
</body>
</html>