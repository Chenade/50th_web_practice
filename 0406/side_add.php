<!doctype HTML5>


<?php
	
	include('conect.php');
	
	if(@$_POST['hidden'] == 'sent'){
		
		$sql = 'INSERT INTO `'.$_GET['name'].'`( `side`, `side_detail`)
				VALUES ("'.$_POST['title'].'","'.$_POST['detail'].'")';
				//echo $sql;
		$run = mysqli_query($con,$sql);
		
	}
	
	$sql = 'SELECT * FROM `'.$_GET['name'].'`';
	$run = mysqli_query($con,$sql);
	$num = mysqli_num_rows($run);	
	
?>

<body align="center">

<?php
	
	if($num >9){
		echo '面向已達上限';
		
	}else{
		echo '<form action="side_add.php?name='. $_GET['name'].'" method="post">
		
		面向：<input type="text" name="title"><br><br>
		面向說明：<input type="text" name="detail"><br><br>
		<input type="hidden" name="hidden" value="sent">
	<br>
		
		<input type="submit">
	</form>
	';
		
	}


?>
	
	
	
<hr>
	<table align="center" cellpadding="10">
	
		<tr>
			<th>編號</th>
			<th>面相標題</th>
			<th>面相標題</th>
			<th>執行</th>
		</tr>
	
	<?php
		
		
		
		while($row = mysqli_fetch_assoc($run)){
			echo '<tr>';
			echo '<td>'.$row['id'].'</td>';
			echo '<td>'.$row['side'].'</td>';
			echo '<td>'.$row['side_detail'].'</td>';
			
			echo '<td>';
				echo '<a href="side_edit.php?id='.$row['id'].'">編輯 | </a>';
				echo '<a href="side_delete.php?id='.$row['id'].'">刪除</a>';
				echo '<td>';
			
			echo '</tr>';
		}
	
	?>
	
	</table>
	<br><br>
	<button onclick=location.href="project.php">DONE
	</button>
</body>
