
<!doctype HTML5>
<html>

<body align="center">
		
	<form action="comment.php" method="post">
		<input type="hidden" name="project" value="<?php echo $_GET['project']; ?>">
		<input type="hidden" name="side" value="<?php echo $_GET['side']; ?>">
		標題：<input type="text" name="title" value="回覆第<?php echo $_GET['no'];?>則留言"><br><br>
		說明：<textarea name="detail">「<?php echo $_GET['content'];?>」</textarea><br><br>
		<br><br>	
		<input type = "hidden" name="comment" value= "sent">
		<input type="submit">
	
	</form>
	
	
	
</body>

</html>