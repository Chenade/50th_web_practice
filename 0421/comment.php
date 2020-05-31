<?php

	include('connect.php');
	
	if(@$_POST['comment'] == 'sent'){
		
		$sql = 'SELECT * FROM `project` WHERE `title` = '.$_POST['project'].'';
		$run = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($run);
		
		$sql = 'INSERT INTO `comment`(`project`, `side`, `title`, `detail`,`total_score`, `total_member`) VALUES ("'.$_POST['project'].'","'.$_POST['side'].'","'.$_POST['title'].'","'.$_POST['detail'].'","'.$row['total_member'].'","0")';
		$run = mysqli_query($con,$sql);
		
		//echo $sql;
		header('location:comment.php?project='.$_POST['project'].'&side='.$_POST['side'].'');
	}
		
	
?>

<!doctype HTML5>
<html>
<head>

<style>

body{
	font-size:xx-large;
}

</style>
</head>
<body align="center">

<?php
	
	if($_SESSION['auth'] == 'leader'){
		echo '<h2>組長專區</h2><br>';
		echo '<form action="comment2.php?project='.$_GET['project'].'&side='.$_GET['side'].'" method="POST">';
		echo '<input type="hidden" name="allow" value="sent">';
		echo '留言功能：<input type="radio" name="comment" value="alive">開啟<input type="radio" name="comment" value="false">關閉';
		echo '<input type="submit">';
		echo '</form>';
	}

	$sql = 'SELECT * FROM `'.$_GET['project'].'` WHERE `side_name` = "'.$_GET['side'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

	if($row['states']=='false'){
		echo '留言功能已關閉';
	}else{
		echo '<form action="comment.php" method="post">
		<input type="hidden" name="project" value="'.$_GET['project'].'">
		<input type="hidden" name="side" value="'.$_GET['side'].'">
		標題：<input type="text" name="title"><br><br>
		說明：<input type="text" name="detail"><br><br>
		回覆：<input type="text" name="refer"><br>
		請標示編號並用分號隔開<br>
		<br><br>	
		<input type = "hidden" name="comment" value= "sent">
		<input type="submit">
	
	</form>';
	
	}
	
	echo '<hr>';
	
	$sql_side = 'SELECT * FROM `comment` WHERE `project` = "'.$_GET['project'].'" AND `side` = "'.$_GET['side'].'"';
	$run_side = mysqli_query($con,$sql_side);
	
	
	while($row = mysqli_fetch_assoc($run_side)){
		echo '<br>';
		echo '<table align="center" border="solid black 1px"  style="width:80vw;">';
		
		echo '<tr>';
		echo '<td rowspan="2">'.$row['no'].'</td>';
		echo '<td>'.$row['title'].'</td>';
		echo '<td>'.$row['time'].'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td colspan="2">'.$row['detail'].'</td>';
		echo '</tr>';
	
		echo '<tr>';
		echo '<td><a href=refer.php?project='.$_GET['project'].'&side='.$_GET['side'].'&no='.$row['no'].'&content='.$row['detail'].'>回覆</a></td>';
		echo '<td>統計分數：'.$row['total_score'].'</td>';
		echo '<td>已評價人數：'.$row['total_member'].'</td>';
		echo '</tr>';
		
		echo '<tr>';
		echo '<td colspan="3" align="center"><input type="number" max="5" min="1"></td>';
		echo '</tr>';
		echo '</table>';
		echo '<br>';
	}

?>
	
	<button onClick=location.href='member.php'>DONE</button>
	
</body>

</html>
