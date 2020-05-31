<!Doctype HTML5>

<head>

<style>
	.but{
		width:90vw;
		height:100px;;
	}
</style>

</head>

<body align="center">
	
	<h3>負責專案</h3>
	<?php
	
		include('conect.php');
	
		$sql = 'SELECT * FROM `project` WHERE `leader` = "'.$_SESSION['name'].'"';
		$run = mysqli_query($con,$sql);
		
		
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="sidelist.php?project='.$row['title'].'&auth=leader">'.$row['title'].'</button>';
		}
		//echo $_SESSION['name'];
	
	
	?>
	
	<hr>
	
	<h3>參與專案</h3>
	
	<?php
	
		
	
		$sql = 'SELECT * FROM `project` WHERE `member` LIKE "%'.$_SESSION['name'].'%"';
		$run = mysqli_query($con,$sql);
		
		
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="sidelist.php?project='.$row['title'].'&auth=member">'.$row['title'].'</button>';
		}
		//echo $_SESSION['name'];
	
	
	?>



</body>