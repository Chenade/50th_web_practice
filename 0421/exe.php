<?php

	include('connect.php');
	

?>

<!doctype HTML5>
<html>

<body align="center">

<?php
	

	
	$sql_side = 'SELECT * FROM `exe` WHERE `project` = "'.$_GET['project'].'" ';
	$run_side = mysqli_query($con,$sql_side);
	
	
	while($row = mysqli_fetch_assoc($run_side)){
		echo '<br>';
		echo '<table align="center" border="solid black 1px"  style="width:80vw;">';
		
		echo '<tr>';
		echo '<td colspan="3" align="center"><h3>'.$row['exe_name'].'</h3></td>';
		echo '</tr>';
		
		$sql2 = 'SELECT * FROM　`comment` WHERE `project` = "'.$_GET['project'].'"';
		$run2 = mysqli_query($con,$sql2);
		
		while($row2 = mysqli_fetch_assoc($run2)){
			
			
			echo '<tr>';
		
			echo '<td>'.$row2['side'].'</td>';
			echo '<td>'.$row2['detail'].'</td>';
			echo '<td>'.$row['no'].'</td>';
			
			echo '</tr>';
		}
		
		
	
		echo '<tr>';
		echo '<td colspan="3" align="center"><a href="">刪除 | </a>';
		echo '<a href="">編輯 | </a>';
		echo '<a href=""> 評分\</a></td>';
		echo '</tr>';
		
		
		echo '</table>';
		echo '<br>';
	}

?>
	
	<button onClick=location.href='member.php'>DONE</button>
	
</body>

</html>
