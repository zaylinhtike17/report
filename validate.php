<?php
include("db_controller.php");
if(isset($_POST['login'])){
	$name = $_POST['name'];
	$pass = md5($_POST['password']);
	$query ="SELECT * FROM user_master WHERE name='$name' and password='$pass'";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result)){
		if($row['name']==$name && $row['password']==$pass && $row['role']==1 && $row['active']==1){
			if(isset($_POST['remember'])){
				setcookie('name',$name,time()+60*60*7);
				setcookie('passord',$pass,time()+60*60*7);
			}
			session_start();
			$_SESSION['name']=$name;
			$_SESSION['id']=$row['id'];
			header("location:index.php");
		}
		elseif ($row['name']==$name && $row['password']==$pass && $row['role']==2 && $row['active']==1) {
			if(isset($_POST['remember'])){
				setcookie('name',$name,time()+60*60*7);
				setcookie('passord',$pass,time()+60*60*7);
			}
			session_start();
			$_SESSION['name']=$name;
			$_SESSION['id']=$row['id'];
			header("location:index2.php");
		}
		elseif ($row['name']==$name && $row['password']==$pass && $row['active']==0) {
			echo "Your account is lock.<br> Click here to <a href='login.php'>try again</a>";
		}
		else{
			echo "Email or Password is Invalid.<br> Click here to <a href='login.php'>try again</a>";
		}
	}
}else{
	header("locaiton:login.php");
}
?>