<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<br><br>
		<form action="login.php" method="post">
			帳號：<input type="text" name="acc"><br>
			密碼:<input type="password" name="pwd"><br>
			
			<input type="submit">
		</form>
		<?php session_start(); echo @$_SESSION['msg']; ?>
	</div>
	
	
	
</body>