<!doctype HTML5>


<?php
	
	include('conect.php');
	
	if(@$_POST['hidden'] == 'leader'){
		echo 'dsedfcgkjygfv';
	}
	
	if(@$_POST['hidden'] == 'sent'){
		
		$sql2 = 'SELECT * FROM `project` WHERE `title` = "'.$_GET['project'].'"';
		$run2 = mysqli_query($con,$sql2);
		$row=mysqli_fetch_assoc($run2);
		
		
		$sql = 'INSERT INTO `comment`(`project`,`side`,`title`, `detail`, `score`) 
				VALUES ("'.$_GET['project'].'","'.$_GET['side'].'","'.$_POST['title'].'","'.$_POST['detail'].'","'.$row['total_mamber'].'")';
		
		//echo $sql;
		$run = mysqli_query($con,$sql);
		
		$sql='SELECT * FROM `comment`';
		$run = mysqli_query($con,$sql);
		$num = mysqli_num_rows($run);
		
		$sql='SELECT * FROM `user`';
		$run = mysqli_query($con,$sql);
		
		
		while($row_score = mysqli_fetch_assoc($run)){
				$sql123 = 'INSERT INTO `score`( `comment_no`, `whom`, `score`) 
				VALUES ("'.$num.'","'.$row_score['name'].'","1")';
				$run123 = mysqli_query($con,$sql123);
				//echo $sql;
		}
	
	}
	
	$sql = 'SELECT * FROM `comment` WHERE `project`="'.$_GET['project'].'" AND `side`="'.$_GET['side'].'"';
	$run = mysqli_query($con,$sql);
	
?>


<body align="center">

<?php
	
	if($_SESSION['auth']=='leader'){
		echo '
		<form action ="comment_allow.php?project='. $_GET['project'].'&side='.$_GET['side'].'" method="post">
		留言功能：<input type="radio" name="allow" value="true">開啟
		<input type="radio" name="allow" value="false">關閉
		<input type="hidden" name="leader" value="leader">
		<input type="submit">
		</form>
		<br><br>
		';
	}
	
	?>

		<form action="comment.php?project=<?php echo $_GET['project'].'&side='.$_GET['side'];?>" method="post">
		
		標題：<input type="text" name="title"><br><br>
		說明 ：<input type="text" name="detail"><br><br>
		<input type="hidden" name="hidden" value="sent">
	<br>
		
		<input type="submit">
	</form>
	


	
	
	
<hr>
	
	
	<?php
		
		
		
		while($row = mysqli_fetch_assoc($run)){
			
			$sql_self ='SELECT * FROM `score` WHERE `comment_no` ="'.$row['id'].'" AND `whom` = "'.$_SESSION['name'].'"';
			$run_self = mysqli_query($con,$sql_self);
			$row_self = mysqli_fetch_assoc($run_self);
			//echo $row_self['score'];
			
			echo '<div align="center">';
			echo '<table align="center" cellpadding="10" border="solid black 1px" padding ="20" style="margin:10px; width:80vw; height:200px;">';
			
			echo '<tr>';
			echo '<td rowspan="3">'.$row['id'].'</td>';
			echo '<td>'.$row['title'].'</td>';
			echo '<td>'.$row['time'].'</td>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<td colspan="2">'.$row['detail'].'<br><br><hr><div align="right">
			<form action="score.php?project='.$_GET['project'].'&side='.$_GET['side'].'" method="post">
			<input type="hidden" name="no" value="'.$row['id'].'">
			評分：<input type="number" name="score" max="5" min="1" value="'.@$row_self['score'].'" style="margin:0px;">
			<input type="submit" value="SENT">	</form>	</div>	</td>';
			echo '</tr>';
			
			echo '<tr>';
			
			echo '<td>被評價總分：'.$row['score'].'</td>';
			echo '<td>以被評價人數：'.$row['people'].'</td>';
			echo '</tr>';
			
			echo '</table>';
			echo '</div>';
		}
	
	?>
	
	
	<br><br>
	<button onclick=location.href="sidelist.php?<?php echo 'project='.$_GET['project'].'&side='.$_GET['side']; ?>">BACK
	</button>
</body>
