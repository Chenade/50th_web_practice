<!doctype HTML5>
<?php
		include('conect.php');
		
		$sql ='SELECT * FROM `project` WHERE `id` = "'.$_GET['id'].'"';
		$run = mysqli_query($con,$sql);
		$row = mysqli_fetch_Assoc($run)
		?>

<body align="center">
	<form action="project_delete2.php" method="post">
		<input type="hidden"  name="id" value="<?php echo $row['id']; ?> ">
		標題：<?php echo $row['title']; ?> <br><br>
		說明：<?php echo $row['detail']; ?> <br><br>
		組長：
	
	<?php
		$sql2 = 'SELECT * FROM user';
		$run2 = mysqli_query($con,$sql2);
		
		while($row2 = mysqli_fetch_Assoc($run2)){
			if($row2['name'] == $row['leader']){
					echo '<input type="radio" name="leader" value="'.$row2['name'].'" checked>'.$row2['name'];
			}else{
				echo '<input type="radio" name="leader" value="'.$row2['name'].'">'.$row2['name'];
			}
		}
	?>
	
	<br><br>
		
		組員名單： <?php echo $row['member'];?> <br><br>
		<div align="center" >
		<div style="border:solid black 1px; width: 300px;">
		<br>
		修改組員名單：<br><br>
		
			<?php
				$sql ='SELECT * FROM `user`';
				$run = mysqli_query($con,$sql);
				
				while($row = mysqli_fetch_Assoc($run)){
					
					echo '<input type="checkbox" name="'.$row['name'].'" >'.$row['name'];
				}
			?>
		<br><br>
		</div>
		</div>
	<br><br>
		
		<input type="submit">
	</form>
</body>
