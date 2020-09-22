<?php
	
	include('connect.php');

	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);
	

?>

<!doctype HTML5>
<html>

<body align="center">

	
	<table align="center" cellpadding="15">
		
		<tr>
			<th>編號</th>
			<th>名稱</th>
			<th>帳號</th>
			<th>密碼</th>
			<th>執行</th>
		</tr>
		
		<?php
		
			while($row = mysqli_fetch_assoc($run)){
				
				echo '<tr>';
				
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['acc'].'</td>';
				echo '<td>'.$row['pwd'].'</td>';
				
				echo '<td>';
				echo '<a href="user_edit.php?id='.$row['id'].'">編輯 | </a>';
				echo '<a href="user_delete.php?id='.$row['id'].'"> 刪除</a>';
				echo '</td>';
			
				echo '</tr>';
				
				
			}
		
		
		?>
		
	</table>
	
	<button onClick=location.href="manager_user.php">BACK</button><br><br>

</body>

</html>