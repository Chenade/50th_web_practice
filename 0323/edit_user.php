<?php
	include("connect.php");
	
	$sql = 'SELECT * FROM `user` WHERE `id` = '.$_GET['id'].'';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

?>



<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>EDIT USER</h1>
		<br>
		<form action="edit_user2.php" method="post">
			ID : <?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
			NAME : <input type="text" name="name" value="<?php echo $row['name'];?>"><br>
			帳號：<input type="text" name="acc" value="<?php echo $row['account'];?>"><br>
			密碼:<input type="text" name="pwd" value="<?php echo $row['password'];?>"><br>
			
			AUTHORITY :

			<?php 
			
				if ($row['authority']=='manager') {
				
					echo '<input type="radio" name="auth" value="manager" checked="true">MANAGER
					<input type="radio" name="auth" value="member">MEMBER';
				}else{
					
					echo '<input type="radio" name="auth" value="manager">MANAGER
					<input type="radio" name="auth" value="member" checked>MEMBER';
				}
				
			?>
			
			
			<br><br>
			
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>