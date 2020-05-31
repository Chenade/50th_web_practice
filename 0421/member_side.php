<?php

	include('connect.php');
	
	$sql = 'SELECT * FROM `'.$_GET['project'].'`';
	$run = mysqli_query($con,$sql);
	$_SESSION['auth'] = $_GET['auth'];
?>


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
	
	if($_SESSION['auth'] == 'leader'){
		
		echo '<button class="buttop" onClick=location.href="exe_add.php?project='.$_GET['project'].'">建立執行方案</button>';
		echo '<button class="buttop" onClick=location.href="point_add.php?project='.$_GET['project'].'">建立指標</button>';
		
		echo '<hr>';
		
	}
	
	echo '<button class="buttop" onClick=location.href="exe.php?project='.$_GET['project'].'">查看執行方案</button>';
	echo '<button class="buttop" onClick=location.href="point.php?project='.$_GET['project'].'">查看指標</button>';
		
		
	while($row = mysqli_fetch_Assoc($run)){
		echo '<button class="but" onClick=location.href="comment.php?project='.$_GET['project'].'&side='.$row['side_name'].'">'.$row['side_name'].'</button>';
	}
?>

	<br><hr><br><button class="but" onClick=location.href="member.php">BACK</button>
	
</body>

</html>