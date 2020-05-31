<?php
	include('connect.php');
	session_start();

	
	//echo $sql;
	//$sql2 = 'SELECT * FROM `'.$_GET['project'].'` WHERE `id` = "'.$_GET['id'].'"';
	//echo $sql2;
	//$run2 = mysqli_query($con,$sql2);
	//$row2 = mysqli_fetch_assoc($run2);

?>

<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1><?php echo $_GET['project'];?></h1>
		
			
			<button onclick=location.href="member.php">BACK</button><br><br>	
			
			<hr>
			
			<form action="exe2.php" method="post">
				
				<input type="hidden" name="project" value="<?php echo $_GET['project'];?>">
				執行方案名稱：<input type="text" name="name"><br><br>
				執行方案說明：<input type="text" name="exe_detail"><br><br>
				
				
			
			<hr>
			
			<h2> 所有留言</h2>
			
			<?php
				
				$sql_2 = 'SELECT * FROM `'.$_GET['project'].'`';
				$run_2 = mysqli_query($con,$sql_2);
				while($row_2 = mysqli_fetch_assoc($run_2)){
					
					$sql = 'SELECT * FROM `comment` WHERE `project` = "'.$_GET['project'].'" AND `side` = "'.$row_2['id'].'"';
					$run = mysqli_query($con,$sql);
					$num = mysqli_num_rows($run);
					if ($num == 0) {echo '此面向無留言';}
					while ($row = mysqli_fetch_assoc($run)){
						
						echo '<input type="radio" name="side_'.$row_2['id'].'" value="'.$row['id'].'">'.$row['id'];
						echo '<table border="1" style="margin:10px; width:80vw; height:200px;">';
						
						echo '<tr>';
						echo '<td rowspan="2" align="center" style="width:5vw;">'.$row['id'].'</td>';
						echo '<td>標題:'.$row['title'].'</td>';
						echo '<td>'.$row['time'].'</td>';
						echo '</tr>';
						
						echo '<tr>';
						echo '<td colspan="2" style="word-break:break-all;">';
						echo '延伸留言編號：'.$row['refer'].'<hr>';
						echo $row['content'];
						echo '</td>';
						echo '</tr>';
						
						echo '<tr>';
						echo '<td>'.$row['side'].'</td>';
						
						
						echo '<td>被評價總分：'.$row['total_score'].'</td>';
						echo '<td>已評價人數:'.$row['total_member'].'</td>';
						echo '</tr>';
						
						echo '</table>';
						
					}
					echo '<hr>';
				}
				
				
			
			?>
			
		
		
				<input type="submit">
			
			</form>
		
	</div>
	
	
	
</body>