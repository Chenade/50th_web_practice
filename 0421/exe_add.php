<!doctype HTML5>

<html>


<head>
<style>

.but {
	
	width:90vw;
	height:80px;
	font-size:xx-large;
	margin:20px;
	
}
.buttop {
	
	width:40vw;
	height:80px;
	font-size:xx-large;
	margin:20px;
	
}
</style>
	
</head>


<body align="center">

<?php

	include('connect.php');
	
	
	$sql_side = 'SELECT * FROM `'.$_GET['project'].'`';
	$run_side = mysqli_query($con,$sql_side);
	
	echo '<form action="exe_add2.php" method="post">';
	echo '執行方案名稱：<input type="text" name="name"><br>';
	echo '執行方案說明：<input type="text" name="detail"><br><hr>';
	echo '<input type="hidden" name="project" value="'.$_GET['project'].'">';
	while($row_side = mysqli_fetch_assoc($run_side)){
		
		$sql= 'SELECT * FROM `comment` WHERE project="'.$_GET['project'].'" AND `side` = "'.$row_side['side_name'].'"';
		$run = mysqli_query($con,$sql);
		
		echo '<h2>'.$row_side['side_name'].'</h2>';
		echo '<br>';
		while($row = mysqli_fetch_assoc($run)){
			
			echo '<table style="width:90vw;">';
			echo '<tr>';
			
			echo '<td>';
			echo '<input type="radio" name="'.$row_side['side_name'].'" value="'.$row['no'].'">';
			echo '</td>';
			
			echo '<td>';
			
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
			echo '<td></td>';
			echo '<td>統計分數：'.$row['total_score'].'</td>';
			echo '<td>已評價人數：'.$row['total_member'].'</td>';
			echo '</tr>';
			
			
			echo '</table>';
			echo '</td>';
			
			echo '</tr>';
			echo '</table>';
			echo '<br>';
		}
		echo '<hr>';
	}
	
	echo '<input type="submit" class="but">';
	echo '</form>';
?>

</body>

</html>