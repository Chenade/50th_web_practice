<?php
	
	include('connect.php');

	$sql = 'SELECT * FROM `project`';
	$run = mysqli_query($con,$sql);
	

?>

<!doctype HTML5>
<html>

<body align="center">

	
	<table align="center" cellpadding="15">
		
		<tr>
			<th>編號</th>
			<th>專案名稱</th>
			<th>專案說明</th>
			<th>組長</th>
			<th>執行</th>
		</tr>
		
		<?php
		
			while($row = mysqli_fetch_assoc($run)){
				
				echo '<tr>';
				
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['detail'].'</td>';
				echo '<td>'.$row['leader'].'</td>';
				
				echo '<td>';
				echo '<a href="side_add.php?project='.$row['name'].'">查看面向 | </a>';
				echo '<a href="project_edit.php?id='.$row['id'].'">編輯 | </a>';
				echo '<a href="project_delete.php?id='.$row['id'].'"> 刪除</a>';
				echo '</td>';
			
				echo '</tr>';
				
				
			}
		
		
		?>
		
	</table>
	
	<button onClick=location.href="manager_project.php">BACK</button><br><br>

</body>

</html>