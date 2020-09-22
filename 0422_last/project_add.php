<!doctype HTML5>


<html>

<body align="center">

	<form action="project_add2.php" method ="post">
		專案名稱：<input type="text" name="name"><br><br>
		專案說明：<input type="text" name="detail"><br><br>
		組長：
		<?php
		
			include('connect.php');
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_Assoc($run)){
				echo '<input type = "radio" name="leader" value="'.$row['name'].'">'.$row['name'];
			}
		
		?>
		<br>
		
		組員：
		<?php
		
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_Assoc($run)){
				echo '<input type = "checkbox" name="'.$row['name'].'">'.$row['name'];
			}
		
		?>
		<br>
		
		<input type="submit"><br><br>
	</form>

	
</body>
</html>