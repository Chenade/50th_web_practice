<!doctype HTML5>

<head></head>

<body align="center">
	
	<h1>使用者清單</h1>
	
	<table align="center" cellpadding="10">
	
	<tr>
		<th>使用者編號</th>
		<th>帳號</th>
		<th>密碼</th>
		<th>權限</th>
		<th>操作</th>
	</tr>
	
	
	<?php
	
		include('connect.php');
		
		$sql = 'SELECT * FROM `user`';
		$run = mysqli_query($con,$sql);
		
		while($row = mysqli_fetch_assoc($run)){
			
			echo '<tr>';
			echo '<td>'.str_pad($row['id'],5,'0',STR_PAD_LEFT).'</td>';
			echo '<td>'.$row['acc'].'</td>';
			echo '<td>'.$row['pwd'].'</td>';
			echo '<td>'.$row['auth'].'</td>';
			
			echo '<td>';
			echo '<a href="user_edit.php?id='.$row['id'].'">編輯 | </a>';
			echo '<a href="user_delete.php?id='.$row['id'].'"> 刪除 </a>';
			echo '</td>';
			
			
			echo '</tr>';
			
			
		}	
	?>
	
	</table>
	
	<br><button onclick=location.href='manager_user.php'>BACK</button><br><br>
</body>