<!doctype HTML5>
<html>

<body align="center">
	
	<table align = "center" cellpadding="15">
		
		<tr>
			<th>專案編號</th>
			<th>名稱</th>
			<th>說明</th>
			<th>組長</th>
			<th>組員</th>
			<th>執行</th>
		</tr>
		
		<?php
		
			include('connect.php');
			
			$sql = 'SELECT * FROM `project`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				
				echo '<tr>';
				echo '<td>'.$row['no'].'</td>';
				echo '<td>'.$row['title'].'</td>';
				echo '<td>'.$row['detail'].'</td>';
				echo '<td>'.$row['leader'].'</td>';
				echo '<td>'.$row['member'].'</td>';
				
				echo '<td>';
				echo '<a href="project_edit.php?no='.$row['no'].'">編輯 | </a>';
				echo '<a href="project_delete.php?no='.$row['no'].'"> 刪除 | </a>';
				echo '<a href="side_add.php?project='.$row['title'].'">  編輯面向</a>';
				echo '</td>';
				
				echo '</tr>';
				
			}
		
		?>
		
	
	</table>
	
	<button onClick=location.href="manager_project.php">BACK</button>
	
</body>

</html>