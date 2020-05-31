<!doctype HTML5>

<?php
	include('conect.php');
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);

?>


<body align="center">
	
	<button onclick=location.href="manager_user.php">BACK</button><br><br>
	
	<table align="center" cellpadding="10">
		<tr>
			<th>使用者編號</th>
			<th>名稱</th>
			<th>帳號</th>
			<th>密碼</th>
			<th>執行</th>
		</tr>
		
		<?php
		
			while($row= mysqli_fetch_assoc($run)){
				echo '<tr>';
				echo '<td>'.STR_PAD($row['id'],5,"0",STR_PAD_LEFT).'</td>';
				echo '<td>'.$row['name'].'</td>';
				echo '<td>'.$row['acc'].'</td>';
				echo '<td>'.$row['pwd'].'</td>';
				
				echo '<td>';
				echo '<a href="user_edit.php?id='.$row['id'].'">編輯 | </a>';
				echo '<a href="user_delete.php?id='.$row['id'].'">刪除</a>';
				echo '<td>';
				
				echo '</tr>';
			}
		
		?>
	
	</table>
	
	
</body>