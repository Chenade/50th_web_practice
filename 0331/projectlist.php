<!doctype HTML5>

<head></head>

<body align="center">
	
	<h1>專案清單</h1>
	
	<table align="center" cellpadding="10">
	
	<tr>
		<th>專案編號</th>
		<th>名稱</th>
		<th>說明</th>
		<th>組長</th>
		<th>人數</th>
		<th>操作</th>
	</tr>
	
	
	<?php
	
		include('connect.php');
		
		$sql = 'SELECT * FROM `project`';
		$run = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_assoc($run)){
			
			echo '<tr>';
			echo '<td>'.str_pad($row['id'],5,'0',STR_PAD_LEFT).'</td>';
			echo '<td>'.$row['name'].'</td>';
			echo '<td>'.$row['detail'].'</td>';
			echo '<td>'.$row['leader'].'</td>';
			echo '<td align="center">'.$row['total_member'].'</td>';
			
			echo '<td>';
			echo '<a href="project_edit.php?id='.$row['id'].'">編輯 | </a>';
			echo '<a href="project_delete.php?id='.$row['id'].'"> 刪除 </a>';
			echo '</td>';
			
			
			echo '</tr>';
			
			
		}	
	?>
	
	</table>
	
	<br><button onclick=location.href='manager_project.php'>BACK</button><br><br>
</body>