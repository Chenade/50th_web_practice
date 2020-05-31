<!doctype HTML5>

<head></head>

<body align="center">

	<form action="user_add2.php" method="post">
	
		名稱：<input type="text" name="name"><br>
		帳號：<input type="text" name="acc"><br>
		密碼：<input type="text" name="pwd"><br>
		
		權限：<input type="radio" name="auth" value="manager">管理員
		<input type="radio" name="auth" value="member">一般使用者<br><br>
		
		<input type="submit">
		
	</form>

	<br><button onclick=location.href='manager_user.php'>BACK</button><br><br>
</body>