<!doctype HTML5>
<html>

<head>

<link rel=stylesheet type="text/css" href="style.css">

</head>

<body align="center" style="">
	<div>
	<form action="login.php" method="post">
	
		帳號：<input type="text" name="acc" ><br><br>
		密碼：<input type="password" name="pwd"><br><br>
		<input type="submit" class="but_half">
	
	</form>
	
	<?php session_start(); echo @$_SESSION['msg'];?>
	</div>
</body>

</html>