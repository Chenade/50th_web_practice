<!doctype HTML5>

<?php

	include('conect.php');
	
	$sql = 'SELECT * FROM `user` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	
?>
<body align="center">
	<form action="user_delete2.php" method="post">
		
		<input type="hidden" name="id" value="<?php echo $row['id'];?>"><br><br>
		名稱：<input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
		帳號：<input type="text" name="acc" value="<?php echo $row['acc'];?>"><br><br>
		密碼：<input type="text" name="pwd" value="<?php echo $row['pwd'];?>"><br><br>
		權限：
			
		<?php
			
			if($row['auth']=='manager'){
				echo '<input type="radio" name="auth" value="manager" checked>管理員
				<input type="radio" name="auth" value="mamber">一般會員';
			}else{
				echo '<input type="radio" name="auth" value="manager" >管理員
				<input type="radio" name="auth" value="mamber" checked>一般會員';
			}
	
		?>
			
			<br><br>
		
		<input type="submit">
	</form>
</body>
