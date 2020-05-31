<?php
	include('connect.php');
	session_start();

	$sql = 'SELECT * FROM `comment` WHERE `project` = "'.$_GET['project'].'" AND `side` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	
	$sql2 = 'SELECT * FROM `'.$_GET['project'].'` WHERE `id` = "'.$_GET['id'].'"';
	//echo $sql2;
	$run2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_assoc($run2);

?>

<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1><?php echo $_GET['project'];?></h1>
		
			
			<button onclick=location.href="member.php">BACK</button><br><br>	
			
			<?php
				
				if ($_SESSION['leader'] == "true"){
					echo '<button onclick=location.href="exelist.php?project='.$_GET['project'].'">查看執行方案</button><br><br>	';
				}else{
					echo '<button onclick=location.href="exelist_member.php?project='.$_GET['project'].'">查看執行方案</button><br><br>	';
				}
			
			?>
			
			
			<hr>
			
			<h2>新增留言</h2>
			
			<?php
				//echo $row2['status'];
				if ($row2['status'] == 'alive'){
					echo '<form action="add_comment.php" method="post">
					
					<input type="hidden" name="project" value="'. $_GET['project'].'">
					<input type="hidden" name="id" value="'. $_GET['id'].'">
					延伸意見(請填寫留言編號，並用逗號分隔)：<br><input type="text" name="refer"><br>
					<br>
					標題： <input type="text" name="title"><br><br>
					說明：<textarea name="detail"></textarea><br><br>
					
					<input type="submit">
					</form>';
					
				}else{
					echo '留言已關閉';
				}
				
				if ($_SESSION['leader'] == "true"){
					echo '<hr><h4>組長專區</h4>';
					echo '<form action="control.php?project='.$_GET['project'].'&side='.$_GET['id'].'" method="post">' ;
					echo '留言功能控制：<input type="radio" name="control" value="alive">開啟留言';
					echo '<input type="radio" name="control" value="dead">關閉留言　';
					echo '<input type="submit">';
					echo '</form>';
					
					echo '產生執行方案：'.$_GET['project'].' 	<button onclick=location.href="exe.php?project='.$_GET['project'].'">GO</button>';
				}
			
			?>
			
			
			
			<hr>
			
			<h2>已發布留言</h2>
			
			<?php
				
				
				while ($row = mysqli_fetch_assoc($run)){
					
					echo '<a id="'.$row['id'].'"></a>';
					echo '<table border="1" style="margin:10px; width:80vw; height:200px;">';
					
					echo '<tr>';
					echo '<td rowspan="2" align="center" style="width:5vw;">'.$row['id'].'</td>';
					echo '<td>標題:'.$row['title'].'</a></td>';
					echo '<td>'.$row['time'].'</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td colspan="2" style="word-break:break-all;">';
					echo '延伸留言編號：<a href="#'.$row['refer'].'">'.$row['refer'].'</a><hr>';
					echo $row['content'];
					echo '</td>';
					echo '</tr>';
					
					echo '<tr>';
					echo '<td>';
					
					$SQL = 'SELECT * FROM `score` WHERE `project` = "'.$_GET['project'].'" AND `whom` = "'.$_SESSION['acc'].'" AND `comment_no.`="'.$row['id'].'"';
					$RUN = mysqli_query($con,$SQL);
					
					
					$row10 = mysqli_fetch_assoc($RUN);
					echo '<form action="change.php?id='.$row['id'].'&project='.$_GET['project'].'" method="post">
					<input type="hidden" name="side" value="'.$_GET['id'].'">
					評分：<input type="number" name="score" value="'.@$row10['score'].'" max="5" min="1"><br>
					<input type="submit">
					</form></td>';
					
					
					echo '<td>被評價總分：'.$row['total_score'].'</td>';
					echo '<td>已評價人數:'.$row['total_member'].'</td>';
					echo '</tr>';
					
					echo '</table>';
					
				}
			
			?>
			
		
		
		
	</div>
	
	
	
</body>