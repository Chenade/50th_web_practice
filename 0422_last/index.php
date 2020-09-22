<!doctype HTML5>


<html>

<body align="center">

	<form action="login.php" method ="post">
		帳號：<input type="text" name="acc"><br><br>
		密碼：<input type="text" name="pwd"><br><br>
		
		<input type="submit"><br><br>
	</form>
	
	<?php 
	
		include('connect.php');
		echo @$_SESSION['msg'];
	
	?>
	
</body>
</html>