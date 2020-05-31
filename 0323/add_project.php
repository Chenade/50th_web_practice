<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>ADD PROJECT</h1>
		<br>
		<form action="add_project2.php" method="post">
			專案名稱 : <input type="text" name="name"><br><br>
			專案說明：<textarea name="detail"></textarea><br>
			
			<hr>
			<h3>專案成員</h3>
			
			<?php 
				include ('connect.php');
				$sql="SELECT * FROM `user`";
				$run = mysqli_query($con,$sql);
				$run2 = mysqli_query($con,$sql);
				
				echo '<h4>組長</h4>';
				while($row = mysqli_fetch_assoc($run)){
					echo '<input type="radio" name="leader" value="'.$row['name'].'">'.$row['name'];
				}
				
				
				
				echo '<h4>組員</h4>';
				while($row2 = mysqli_fetch_assoc($run2)){
					echo '<input type="checkbox" name="'.$row2['name'].'" >'.$row2['name'];
				}
			
			?>
			
			
			<hr>
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>