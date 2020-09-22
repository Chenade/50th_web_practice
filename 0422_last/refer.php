<?php
	
	include('connect.php');

	
	
	if(@$_POST['comment'] == 'sent'){
		
		$sql = 'SELECT * FROM `project` WHERE `name` = "'.$_POST['project'].'"';
		$run = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($run);
		
		//echo $sql;
		$sql ='INSERT INTO `comment`(`project`,`side`,`title`, `detail`, `whom`, `total_member`, `total_score`) 
				VALUES ("'.$_POST['project'].'","'.$_POST['side'].'","'.$_POST['name'].'","'.$_POST['detail'].'","'.$_SESSION['acc'].'","'.$row['total_member'].'","'.$row['total_member'].'")';
		$run = mysqli_query($con,$sql);
		//echo $sql;
		header('location:comment.php?project='.$_POST['project'].'&side='.$_POST['side'].'');
	}

?>


<!doctype HTML5>


<html>

<body align="center">

	
	<form action="refer.php" method ="post">
		留言標題：回覆第<?php echo $_GET['title'];?>則留言
		<input type="hidden" name="name" value="回覆第<?php echo $_GET['title'];?>則留言"><br><br>
		留言說明：<textarea name="detail">「<?php echo $_GET['content'];?>」</textarea><br><br>
		
		<input type="hidden" name="project" value="<?php echo $_GET['project'];?>">
		<input type="hidden" name="side" value="<?php echo $_GET['side'];?>.'">
		<input type="hidden" name="comment" value="sent">
		<input type="submit"><br><br>
		</form>

	
	<hr>
	
	
	<button onClick=location.href="projectlist.php">DONE</button><br><br>
	
</body>
</html>