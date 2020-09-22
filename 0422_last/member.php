<!doctype HTML5>

<?php

	include('connect.php');
	
	
	
	
?>

<html>
<style>

	.but{
		
		width:80vw;
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
	
	<h2>負責專案</h2>
	<?php
		$sql = 'SELECT * FROM `project` WHERE `leader` = "'.$_SESSION['acc'].'"';
		$run = mysqli_query($con,$sql);
	
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="member_side.php?auth=leader&project='.$row['name'].'">'.$row['name'];
			echo '</button>';	
		}
	?>
		
	<hr>
	<h2>參與專案</h2>
	<?php
		$sql = 'SELECT * FROM `project` WHERE `member` LIKE "%'.$_SESSION['acc'].'%"';
		$run = mysqli_query($con,$sql);
	
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="member_side.php?auth=member&project='.$row['name'].'">'.$row['name'];
			echo '</button>';	
		}
	?>
	
	<br><br><br>
	
		<button class= "buttop" onClick=location.href="logout.php">登出</button><br><br>
</body>
</html>