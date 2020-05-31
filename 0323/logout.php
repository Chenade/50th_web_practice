<?php


session_start();
$_SESSION['acc']="";
$_SESSION['leader']="";
$_SESSION['auth']="";
$_SESSION['msg']="";


header('location:index.php');
?>