<?php
	include('connect.php');
	session_start();

	
?>


<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>PROJECT LISTS</h1>
		<button onclick=location.href="manager_project.php">PROJECT MANAGEMENT</button>
		<br><br>
			<table border="0" cellpadding="10">
			
			<tr>
				<th style="width:80px;">ID</th>
				<th style="width:120px;">專案名稱</th>
				<th style="width:250px">專案說明</th>
				<th style="width:250px">專案組長</th>
				<th style="width:200px">ACTION</th>
			</tr>
			
			<?php
				$sql2 = 'SELECT * FROM `project`';
				$run_2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($run_2);
				
				while($row = mysqli_fetch_assoc($run_2)){
					
					echo '<tr>';
					echo '<td  align="center">'.$row['id'].'</td>';
					echo '<td align="center">'.$row['name'].'</td>';
					echo '<td align="center" style="word-break:break-all;">'.$row['detail'].'</td>';
					echo '<td align="center">'.$row['leader'].'</td>';
					
					echo '<td>';
					echo '<a href="side.php?name='.$row['name'].'">編輯面向 | </a>';
					echo '<a href="edit_project.php?id='.$row['id'].'">編輯專案 | </a>';
					echo '<a href="delete_project.php?id='.$row['id'].'">刪除專案</a>';
					echo '</td>';
					
					echo '</tr>';
					
				}
				
				
				
			?>
			
			
			</table>
			
		
	</div>
	
	
	
</body>