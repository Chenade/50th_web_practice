<?php
	
	include('connect.php');

	$sql = 'SELECT * FROM `'.$_GET['project'].'`';
	$run = mysqli_query($con,$sql);
	$num = mysqli_num_rows($run);
	
	if(@$_POST['side'] == 'sent'){
		$sql ='INSERT INTO `'.$_POST['project'].'`(`side_name`, `side_detail`) VALUES ("'.$_POST['name'].'","'.$_POST['detail'].'")';
		$run = mysqli_query($con,$sql);
		
		header('location:side_add.php?project='.$_POST['project'].'');
	}

?>


<!doctype HTML5>


<html>

<body align="center">

<?php
	
	if($num > 9){
		echo '面向已超過10個';
		
	}else{
		
		echo '<form action="side_add.php" method ="post">
		面向名稱：<input type="text" name="name"><br><br>
		面向說明：<input type="text" name="detail"><br><br>
		
		<input type="hidden" name="project" value="'.$_GET['project'].'">
		<input type="hidden" name="side" value="sent">
		<input type="submit"><br><br>
		</form>
		';
		
		
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
		
			while($row = mysqli_fetch_assoc($run)){
				
				echo '<tr>';
				
				echo '<td>'.$row['id'].'</td>';
				echo '<td>'.$row['side_name'].'</td>';
				echo '<td>'.$row['side_detail'].'</td>';
				
				echo '<td>';
				
				echo '<a href="side_edit.php?project='.$_GET['project'].'&id='.$row['id'].'">編輯 | </a>';
				echo '<a href="side_delete.php?project='.$_GET['project'].'&id='.$row['id'].'"> 刪除</a>';
				echo '</td>';
			
				echo '</tr>';
				
				
			}
		
		
		?>
		
	</table>
	
	<button onClick=location.href="projectlist.php">DONE</button><br><br>
	
</body>
</html>