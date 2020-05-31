<!doctype HTML5>

<?php
	include('conect.php');
	
	$sql = 'SELECT * FROM `project`';
	$run = mysqli_query($con,$sql);

?>


<body align="center">
	
	<button onclick=location.href="manager_project.php">BACK</button><br><br>
	
	<table align="center" cellpadding="10">
		<tr>
			<th>專案編號</th>
			<th>名稱</th>
			<th>組長</th>
			<th>組員人數</th>
		
			<th>執行</th>
		</tr>
		
		<?php
		
			while($row= mysqli_fetch_assoc($run)){
				echo '<tr>';
				echo '<td>'.STR_PAD($row['id'],5,"0",STR_PAD_LEFT).'</td>';
				echo '<td>'.$row['title'].'</td>';
				echo '<td>'.$row['leader'].'</td>';
				echo '<td>'.$row['total_mamber'].'</td>';
					
				echo '<td>';
				echo '<a href="project_edit.php?id='.$row['id'].'">編輯 | </a>';
				echo '<a href="side_add.php?name='.$row['title'].'"> 查看面向 | </a>';
				echo '<a href="project_delete.php?id='.$row['id'].'"> 刪除</a>';
				echo '<td>';
				
				echo '</tr>';
			}
		
		?>
	
	</table>
	
	
</body>