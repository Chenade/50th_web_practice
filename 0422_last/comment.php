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
		
		$sql = 'SELECT * FROM `comment`';
		$run = mysqli_query($con,$sql);
		$num = mysqli_num_rows($run);
		
			
		$sql = 'SELECT * FROM `user` ';
		$run = mysqli_query($con,$sql);
		while($row = mysqli_fetch_assoc($run)){
			$sql2 ='INSERT INTO `score`(`project`, `side`, `comment_no`,  `whom`) VALUES ("'.$_POST['project'].'","'.$_POST['side'].'","'.$num.'","'.$row['name'].'")';
			$run2 = mysqli_query($con,$sql2);
		}	
	
		header('location:comment.php?project='.$_POST['project'].'&side='.$_POST['side']);
	}

?>


<!doctype HTML5>


<html>

<body align="center">

	
	<form action="comment.php" method ="post">
		留言標題：<input type="text" name="name"><br><br>
		留言說明：<input type="text" name="detail"><br><br>
		
		<input type="hidden" name="project" value="<?php echo $_GET['project'];?>">
		<input type="hidden" name="side" value="<?php echo $_GET['side'];?>">
		<input type="hidden" name="comment" value="sent">
		<input type="submit"><br><br>
		</form>

	
	<hr>
	
	
<?php
	
	$sql = 'SELECT * FROM `comment`';
	$run = mysqli_query($con,$sql);
	


	while($row = mysqli_fetch_assoc($run)){
		
		echo '<br>';
		
		echo '<table align="center" cellpadding="15" border="1" style="width:80vw;	">';
		
		echo '<tr>';
		echo '<td rowspan="3">'.$row['id'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['time'].'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td colspan="2">'.$row['detail'].'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td>評分總分：'.$row['total_score'].'</td>';
		echo '<td>已評分人數：'.$row['total_member'].'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td align="center" colspan="3">';
		
		echo '<form action="score.php" method="post">';
		echo '<a href="refer.php?title='.$row['id'].'&content='.$row['detail'].'&project='.$_GET['project'].'&side='.$_GET['side'].'">回覆</a>';
		echo '<input type="hidden" name="project" value="'.$row['project'].'">';
		echo '<input type="hidden" name="side" value="'.$row['side'].'">';
		echo '<input type="hidden" name="id" value="'.$row['id'].'">';
		echo ' | 評分： <input type="number"  name="score" max="5" min="1">　';
		echo '<input type="submit">';
		echo '</form>';
		echo '</td>';
		echo '</tr>';
		
		echo '</table>';
		
		echo '<br>';
	}
		
		
?>
		
	
	
	<button onClick=location.href="member.php">BACK</button><br><br>
	
</body>
</html>