<!doctype HTML5>
<html>

<body align="center">
	
	<form action="project_add2.php" method="post">
	
		標題：<input type="text" name="title"><br><br>
		說明：<input type="text" name="detail"><br><br>
		組長：
		
		<?php
			
			include('connect.php');
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				echo '<input type="radio" name="leader" value="'.$row['name'].'">'.$row['name'];
			}
		?>
		
		<br><br>
		
		
		組員：
		
		<?php
			
			
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				echo '<input type="checkbox" name="'.$row['name'].'">'.$row['name'];
			}
		?>
		
		<br><br>
		
	
		<input type="submit">
	
	</form>
	
	
	
</body>

</html>