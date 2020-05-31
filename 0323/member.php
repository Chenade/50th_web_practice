<!doctype HTML5>
<head>

<style>
.project{
	
	width:80vw;
	height:80px;
	font-size:50px;
	margin:10px;
}
</style>

</head>

<body>
	
	<div align='center' style='width:90vw;'>
		<h1>MEMBER</h1>
		
		<?php
			include('connect.php');
			session_start();
			
			echo '<h2>負責專案</h2>';
			$sql = 'SELECT * FROM `project` WHERE `leader` LIKE "%'.$_SESSION['acc'].'%"';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				echo '<button class="project" onclick=location.href="view_project.php?auth=leader&name='.$row['name'].'">'.$row['name'].'</button>';
			}
			
			echo '<hr>';
			
			echo '<h2>參與專案</h2>';
			$sql = 'SELECT * FROM `project` WHERE `member` LIKE "%'.$_SESSION['acc'].'%"';
			$run = mysqli_query($con,$sql);
			
			while($row = mysqli_fetch_assoc($run)){
				echo '<button class="project" onclick=location.href="view_project.php?auth=member&name='.$row['name'].'">'.$row['name'].'</button>';
			}
			
		
		?>
		
		
		<br><button onclick=location.href="logout.php">LOGOUT</button>
	
	</div>

</body>