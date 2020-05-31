<?php
	include("connect.php");
	
	$sql = 'SELECT * FROM `user`';
	$run = mysqli_query($con,$sql);

?>

<!doctype HTML5>

<hesd>

	<style>
		.table_t td {width:1100px;}
	</style>
	
</head>

<body>

	<div align='center' style="width:98vw">
		<h1>USER</h1>
		<button onclick=location.href="manager.php">BACK</button><br><br>
		
		<table id="table_t" padding="5">
			<tr>
				<th>ID</th>
				<th>NAME</th>
				<th>ACCOUNT</th>
				<th>AUTHORITY</th>
				<th>ACTION</th>
			</tr>
			
			<?php 
			
				while($row = mysqli_fetch_assoc($run)){
					echo '<tr>';
					
					echo '<td align="center" style="width:80px;">'.$row['id'].'</td>';
					echo '<td align="center" style="width:100px;">'.$row['name'].'</td>';
					echo '<td align="center" style="width:100px;">'.$row['account'].'</td>';
					echo '<td align="center" style="width:100px;">'.$row['authority'].'</td>';
					echo '<td align="center" style="width:150px;">';
					echo '<a href="edit_user.php?id='.$row['id'].'">EDIT |</a>';
					echo '<a href="delete_user.php?id='.$row['id'].'"> DELETE</a>';
					echo '</td>';
					
					echo '</tr>';
				}
			
			?>
		
		</table>
		
	</div>

</body>