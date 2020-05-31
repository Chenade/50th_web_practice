<?php
	include('connect.php');
	session_start();
	//$_SESSION['project'] = 'all';
	
	if(@$_POST['hidden'] == "new"){
		
		$sql = 'INSERT INTO `'.$_GET['name'].'` (`side`, `side_detail`) VALUES ("'.$_POST['name'].'","'.$_POST['detail'].'")';
		$run = mysqli_query($con,$sql);
		$_SESSION['count'] +=1;
		
	}else
	{
		$_SESSION['count'] =1;
	}

	$sql2 = "SELECT * FROM `".$_GET['name']."`";
	$run_2 = mysqli_query($con,$sql2);
	$num = mysqli_num_rows($run_2);
	
?>


<!Doctype HTML5>
<head></head>

<body style="margin:0px;">
	
	<div align="center" style="width:100vw;">
		<h1>ADD SIDE</h1>
		<br>
		<?php 
			if($num > 10){
				echo "已達面向上限(10)";
			}else{
				echo '<form action="side.php?name='.$_GET['name'].'" method="post">
			面相名稱 : <input type="text" name="name"><br><br>
			面相說明：<textarea name="detail"></textarea><br><br>
			
			<input type="hidden" name="hidden" value="new">
			<input type="submit">
			<input type="reset">
		</form>
';
			}
		
		?>
		
		
			<hr>
			
			
			<h2>已新增面向</h2>
			
			<table>
			<tr>
				<th style="width:80px;">ID</th>
				<th style="width:150px;">面相名稱</th>
				<th style="width:250px">面相說明：</th>
				<th style="width:80px">ACTION</th>
			</tr>
			
			<?php
			
			
			while ($row = mysqli_fetch_assoc($run_2)){
				
				echo '<tr>';
				echo '<td align="center">'.$row['id'].'</td>';
				echo '<td align="center">'.$row['side'].'</td>';
				echo '<td align="center">'.$row['side_detail'].'</td>';
				
				echo '<td>';
				echo '<a href="comment.php?name='.$_GET['name'].'&id='.$row['id'].'">查看 | </a>';
				echo '<a href="edit_side.php?name='.$_GET['name'].'&id='.$row['id'].'">編輯 | </a>';
				echo '<a href="delete_side.php?name='.$_GET['name'].'&id='.$row['id'].'"> 刪除</a>';
				echo '</td>';
				
				echo '</tr>';
				
			}
			
			
			?>
			
			</table>
		
		
		
		
	</div>
	
	
	
</body>