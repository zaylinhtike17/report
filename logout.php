<?php
session_start();
-	session_destroy();
if(isset($_COOKIE['name']) and isset($_COOKIE['pass'])){
	$name=$_COOKIE['name'];
	$pass=$_COOKIE['pass'];
	setcookie('name',$name,time()-1);
	setcookie('passord',$pass,time()-1);
}
header("location:login.php");
?>