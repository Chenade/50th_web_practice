<!doctype HTML5>
<html>

<body align="center">
	
	<table align = "center" cellpadding="15">
		
		<tr>
			<th>使用者編號</th>
			<th>名稱</th>
			<th>帳號</th>
			<th>密碼</th>
			<th>權限</th>
			<th>執行</th>
		</tr>
		
		<?php
		
			include('connect.php');
			
			$sql = 'SELECT * FROM `user`';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				
				echo '<tr>';
				echo '<td>'.$row['no'].'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['acc'].'</td>';
				echo '<td>'.$row['pwd'].'</td>';
				echo '<td>'.$row['auth'].'</td>';
				
				echo '<td>';
				echo '<a href="user_edit.php?no='.$row['no'].'">編輯 | </a>';
				echo '<a href="user_delete.php?no='.$row['no'].'"> 刪除</a>';
				echo '</td>';
				
				echo '</tr>';
				
			}
		
		?>
		
	
	</table>
	
	<button onClick=location.href="manager.php">BACK</button>
	
</body>

</html>