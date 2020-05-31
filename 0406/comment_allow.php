<?php
	
	session_start();
	
	if($_POST['allow'] == 'false'){
		$_SESSION['comment']='disallow';
	}else{
		$_SESSION['comment']='allow';
	}
	
	echo $_SESSION['comment'];
	//header('location:comment.php?project='.$_GET['project'].'&side='.$_GET['side']);

?>