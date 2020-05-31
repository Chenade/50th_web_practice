<?php

	include('connect.php');
	
	if(@$_POST['side'] == 'sent'){
		
		$sql = 'INSERT INTO `'.$_POST['project'].'`( `side_name`, `side_detail`) VALUES ("'.$_POST['title'].'","'.$_POST['detail'].'")';
		$run = mysqli_query($con,$sql);
		
		//echo $sql;
		header('location:side_add.php?project='.$_POST['project'].'');
	}
	
	$sql_side = 'SELECT * FROM `'.$_GET['project'].'`';
	$run_side = mysqli_query($con,$sql_side);
	$num_side = mysqli_num_rows($run_side);
	
?>

<!doctype HTML5>
<html>

<body align="center">
	
	
<?php
	
	if($num_side > 9 ){
		echo '已達面向上限';
	}else{
		echo '<form action="side_add.php" method="post">
		<input type="hidden" name="project" value="'.$_GET['project'].'">
		標題：<input type="text" name="title"><br><br>
		說明：<input type="text" name="detail"><br><br>
		<br><br>	
		<input type = "hidden" name="side" value= "sent">
		<input type="submit">
	
	</form>';
	}


?>
	
	
	<hr>
	
	<table align="center" cellpadding="15">
		
		<tr>
			<th>編號</th>
			<th>面向名稱</th>
			<th>面向說明</th>
			<th>執行</th>
		</tr>
		
<?php

	
	
	while($row = mysqli_fetch_assoc($run_side)){
		echo '<tr>';
		echo '<td>'.$row['no'].'</td>';
		echo '<td>'.$row['side_name'].'</td>';
		echo '<td>'.$row['side_detail'].'</td>';
		
		echo '<td>';
		echo '<a href="side_edit.php?project='.$_GET['project'].'&no='.$row['no'].'">編輯 | </a>';
		echo '<a href="side_delete.php?project='.$_GET['project'].'&no='.$row['no'].'">  刪除</a>';
		echo '</td>';
				
				
		echo '</tr>';
	}

?>
	</table>
	
	<button onClick=location.href='projectlist.php'>DONE</button>
	
</body>

</html>