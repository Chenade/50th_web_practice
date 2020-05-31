<!Doctype HTML5>

<head>

<style>
	.but{
		width:90vw;
		height:100px;;
		margin:10px;
	}
</style>

</head>

<body align="center">
	
	
	
	<?php
	
		include('conect.php');
	
		$sql = 'SELECT * FROM `'.$_GET['project'].'`';
		$run = mysqli_query($con,$sql);
		
		if(@$_GET['auth'] == 'leader'){
			$_SESSION['auth']='leader';
		}else{
			$_SESSION['auth']='member';
		}
		
		while($row = mysqli_fetch_assoc($run)){
			echo '<button class="but" onClick=location.href="comment.php?project='.$_GET['project'].'&side='.$row['side'].'">'.$row['side'].'</button><br>';
		}
		//echo $_SESSION['name'];
	
	
	?>



</body>