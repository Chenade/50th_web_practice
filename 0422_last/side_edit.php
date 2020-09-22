<?php
	
	include('connect.php');

	$sql = 'SELECT * FROM `'.$_GET['project'].'` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);
	$num = mysqli_num_rows($run);
	
	if(@$_POST['side'] == 'sent'){
		$sql ='UPDATE `'.$_POST['project'].'` SET `side_name`="'.$_POST['name'].'",`side_detail`="'.$_POST['detail'].'" WHERE `id` = "'.$_POST['id'].'"';
		$run = mysqli_query($con,$sql);
		
		header('location:side_add.php?project='.$_POST['project'].'');
	}

?>


<!doctype HTML5>


<html>

<body align="center">

		<form action="side_edit.php" method ="post">
		面向名稱：<input type="text" name="name" value="<?php echo $row['side_name'];?>"><br><br>
		面向說明：<input type="text" name="detail" value="<?php echo $row['side_detail'];?>"><br><br>
		
		<input type="hidden" name="project" value="<?php echo $_GET['project'];?>">
		<input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
		<input type="hidden" name="side" value="sent">
		<input type="submit"><br><br>
		</form>
			
	<button onClick=location.href="side_add.php?project=<?php echo $_GET['project'];?>">BACK</button><br><br>
	
</body>
</html>