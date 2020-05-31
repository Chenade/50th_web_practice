<?php
	include('connect.php');
	session_start();

	
?>


<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>EXE LISTS</h1>
		<button onclick=location.href="member.php">project LIST</button>
		<br><br>
			<table border="0" cellpadding="10">
			
			<tr>
				<th style="width:10vw;">ID</th>
				<th style="width:20vw;">執行方案名稱名稱</th>
				<th style="width:40vw">執行方案說明</th>
				<th style="width:15vw">留言編號</th>
				<th style="width:15vw">ACTION</th>
			</tr>
			
			<?php
				$sql2 = 'SELECT * FROM `exe` WHERE `project` = "'.$_GET['project'].'"';
				$run_2 = mysqli_query($con,$sql2);
				$num = mysqli_num_rows($run_2);
				
				while($row = mysqli_fetch_assoc($run_2)){
					
					echo '<tr>';
					echo '<td  align="center">'.$row['id'].'</td>';
					echo '<td align="center">'.$row['name'].'</td>';
					echo '<td align="center" style="word-break:break-all;">'.$row['exe_detail'].'</td>';
					echo '<td align="center">'.$row['comments'].'</td>';
					
					echo '<td>';
					echo '<a href="exe_detail.php?name='.$row['name'].'&project='.$_GET['project'].'">查看 | </a>';
					echo '<a href="edit_exe.php?id='.$row['id'].'&project='.$_GET['project'].'">編輯 | </a>';
					echo '<a href="delete_exe.php?id='.$row['id'].'&project='.$_GET['project'].'">刪除</a>';
					echo '</td>';
					
					echo '</tr>';
					
				}
				
				
				
			?>
			
			
			</table>
			
		
	</div>
	
	
	
</body>