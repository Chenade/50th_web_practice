<!doctype HTML5>

<?php

	include('connect.php');
	
	$_SESSION['auth']=$_GET['auth'];
	
	
?>

<html>
<style>

	.but{
		
		width:75vw;
		font-size:xx-large;
		height:100px;
		margin:20px;
	}

	.buttop{
		
		width:35vw;
		font-size:xx-large;
		height:100px;
		margin:20px;
	}
</style>
<head>


</head>

<body align="center">
	
	
	<?php
		
		if($_SESSION['auth'] == 'leader'){
			
			echo '<button class="buttop" onClick=location.href="exe_add.php?project='.$_GET['project'].'">建立執行方案';
			echo '</button>';	
			echo '<button class="buttop" onClick=location.href="point_add.php?project='.$_GET['project'].'">建立指標';
			echo '</button>';	
			
			echo '<hr>';
			
		}
		
			echo '<button class="buttop" onClick=location.href="exe_add.php?project='.$_GET['project'].'">查看執行方案';
			echo '</button>';	
			echo '<button class="buttop" onClick=location.href="point_add.php?project='.$_GET['project'].'">查看指標';
			echo '</button>';	
			
		$sql = 'SELECT * FROM `'.$_GET['project'].'`';
		$run = mysqli_query($con,$sql);
	
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="comment.php?project='.$_GET['project'].'&side='.$row['side_name'].'">'.$row['side_name'];
			echo '</button>';	
		}
	?>
		
	
	
	<br><br><br>
	
		<button class= "buttop" onClick=location.href="logout.php">登出</button><br><br>
</body>
</html>