<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>ADD USER</h1>
		<br>
		<form action="add_user2.php" method="post">
			NAME : <input type="text" name="name"><br>
			帳號：<input type="text" name="acc"><br>
			密碼:<input type="password" name="pwd"><br>
			
			AUTHORITY : 
			<select name="auth">
				<option value = "member">MEMBER</option>
				<option value = "manager">MANAGER</option>
			</select><br><br>
			
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>