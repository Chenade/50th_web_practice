<?php

	include('connect.php');
	$_SESSION['auth']='';
?>


<!doctype HTML5>
<html>

<head>
<link rel=stylesheet type="text/css" href="style.css">
</head>

<body align="center">
	<div>
<?php
	$sql = 'SELECT * FROM `project` WHERE `leader` = "'.$_SESSION['acc'].'"';
	$run = mysqli_query($con,$sql);
		
	while($row = mysqli_fetch_Assoc($run)){
		echo '<button class="but" onClick=location.href="member_side.php?project='.$row['title'].'&auth=leader">'.$row['title'].'</button>';
	}
?>

	<hr>

<?php
	$sql = 'SELECT * FROM `project` WHERE `member` LIKE "%'.$_SESSION['acc'].'%"';
	$run = mysqli_query($con,$sql);
		
	while($row = mysqli_fetch_Assoc($run)){
		echo '<button class="but" onClick=location.href="member_side.php?project='.$row['title'].'&auth=member">'.$row['title'].'</button>';
	}
?>
	</div>
</body>

</html>