
<!doctype HTML5>

<head></head>

<body align="center">

	<form action="project_add2.php" method="post">
		
		
		名稱：<input type="text" name="name" ><br>
		內容：<textarea name="detail"></textarea><br>
		
		組長：
		
		<?php
			
			include('connect.php');
			
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