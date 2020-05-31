<?php

	include('connect.php');
	
	if(@$_POST['point'] == 'sent'){
		
		$sql = 'INSERT INTO `point`( `name`, `whom`) VALUES ("'.$_POST['name'].'","'.$_SESSION['acc'].'")';
		$run = mysqli_query($con,$sql);
		
		//echo $sql;
		header('location:point.php?project='.$_POST['project'].'');
	}
	
	$sql_side = 'SELECT * FROM `point`';
	$run_side = mysqli_query($con,$sql_side);
	$num_side = mysqli_num_rows($run_side);
	
?>

<!doctype HTML5>
<html>

<body align="center">
	
	

	
	
	<hr>
	
	<table align="center" cellpadding="15">
		
		<tr>
			<th>編號</th>
			<th>指標名稱</th>
			
			
		</tr>
		
<?php

	
	
	while($row = mysqli_fetch_assoc($run_side)){
		echo '<tr>';
		echo '<td>'.$row['no'].'</td>';
		echo '<td>'.$row['name'].'</td>';
		
				
				
		echo '</tr>';
	}

?>
	</table>
	
	<button onClick=location.href='member_Side.php?auth=leader&project=<?php echo $_GET['project'];?>'>DONE</button>
	
</body>

</html>