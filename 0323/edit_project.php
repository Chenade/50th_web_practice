<?php 
include('connect.php');

	$sql = 'SELECT * FROM `project` WHERE `id` = "'.$_GET['id'].'"';
	$run = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($run);

?>

<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>EDIT PROJECT</h1>
		<br>
		<form action="edit_project2.php" method="post">
			<input type="hidden" name="id" value="<?php echo $_GET['id']?>">
			專案名稱 : <input type="text" name="name" value="<?php echo $row['name'];?>"><br><br>
			專案說明：<textarea name="detail"> <?php echo $row['detail'];?></textarea><br>
			
			
			<h3>專案成員</h3>
			
			<?php 
				
				$sql2="SELECT * FROM `user`";
				$run2 = mysqli_query($con,$sql2);
				
				$sql31="SELECT * FROM `user`";
				$run31 = mysqli_query($con,$sql31);
				
				echo '目前專案名單：' .$row['leader'] .'(組長),' . $row['member'];
				
				
				
				echo '<hr>';
				
				echo '<h3>修改專案名單：</h3>';
				
				echo '組長：';
				
				while($row2 = mysqli_fetch_assoc($run2)){
					if ($row['leader'] == $row2['name']){
						echo '<input type="radio" name="leader" value="'.$row2['name'].'" checked="true">'.$row2['name'];
					}else{
						echo '<input type="radio" name="leader" value="'.$row2['name'].'">'.$row2['name'];
					}
				}
				
				echo '<br><br>組員：';
				
				while($row31 = mysqli_fetch_assoc($run31)){
					echo '<input type="checkbox" name="'.$row31['name'].'" >'.$row31['name'];
				}
			
			?>
			
			
			<hr>
			<input type="submit">
			<input type="reset">
		</form>
	
	</div>
	
	
	
</body>