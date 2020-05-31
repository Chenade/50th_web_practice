<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
?>


<!doctype HTML5>

<head></head>

<body align="center">

	<form action="project_edit2.php" method="post">
		
		<input type='hidden' name="id" value="<?php echo $row['id'];?>">
		名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br>
		內容：<textarea name="detail"><?php echo $row['detail'];?></textarea><br>
		組長：  <?php echo $row['leader'];?> <br>
		組員名單： <?php echo $row['member'];?><br>
		<hr>
		
		<h3>更改成員</h3>
		組長：
		
		<?php
			
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while( $row = mysqli_fetch_assoc($run) ){
				
				echo '<input type="radio" name="leader" value="'.$row['name'].'">';
				echo $row['name'];
			}
		
		
		?>
		
		<br>
		
		組員：
		
		<?php
			
			
			
			$sql2 = 'SELECT * FROM `user`';
			$run2 = mysqli_query($con,$sql2);
			
			while( $row2 = mysqli_fetch_assoc($run2) ){
				echo '<input type="checkbox" name="'.$row2['name'].'">';
				echo $row2['name'];
			}
		
		
		?>
		
		<br><br>
		<input type="submit">
		
	</form>

	<br><button onclick=location.href='projectlist.php'>BACK</button><br><br>
</body>