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
		<h1>DELETE USER</h1>
		<br>
		<form action="delete_user2.php" method="post">
			ID : <?php echo $row['id'];?> <input type="hidden" name="id" value="<?php echo $row['id'];?>"><br>
			NAME : <?php echo $row['name'];?><br>
			帳號：<?php echo $row['account'];?><br>
			密碼:<?php echo $row['password'];?><br>
			
			AUTHORITY :

			<?php 
			
				if ($row['authority']=='manager') {
				
					echo 'MANAGER';
				}else{
					
					echo 'MEMBER';
				}
				
			?>
			
			
			<br><br>
			
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>