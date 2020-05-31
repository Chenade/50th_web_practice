<?php
	include('connect.php');
	session_start();
	//$_SESSION['project'] = 'all';
	
	$sql = 'SELECT * FROM `project` WHERE `name` = "'.$_SESSION['project'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	
	$sql2 = 'SELECT * FROM `'.$_SESSION['project'].'`';
	$run_2 = mysqli_query($con,$sql2);
	$num = mysqli_num_rows($run_2);
	
?>


<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>PROJECT DETAIL</h1>
		<br>
			<table border="0" cellpadding="10">
			
			<?php
				echo '<tr><td>專案名稱</td><td>'.$row['name'].'</td></tr>';
				echo '<tr><td>專案說明</td><td>'.$row['detail'].'</td></tr>';
			?>
			
			
			</table>
			<hr>
			
			
			<h2>已新增面向</h2>
			
			<table>
			<tr>
				<th style="width:80px;">ID</th>
				<th style="width:150px;">面相名稱</th>
				<th style="width:250px">面相說明</th>
			</tr>
			
			
			<?php
			
			
			while ($row_2 = mysqli_fetch_assoc($run_2)){
				
				echo '<tr>';
				echo '<td align="center">'.$row_2['id'].'</td>';
				echo '<td align="center">'.$row_2['side'].'</td>';
				echo '<td align="center">'.$row_2['side_detail'].'</td>';
				echo '</tr>';
				
			}
			
			
			?>
			
			</table>
		
		
		<button onclick=location.href="project.php">DONE</button>
		
	</div>
	
	
	
</body>