<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname ="reporting_system";

$dbhandle = mysqli_connect($dbhost, $dbuser, $dbpass) or die("could not connect to database");
$selected =mysqli_select_db($dbhandle,$dbname);

if(isset($_POST['uname']) && isset($_POST['pass'])){
	$uname =$_POST['uname'];
	$pass =md5($_POST['pass']);
	$role=$_POST['role'];
	$active=$_POST['active'];
		// $pass=md5($pass);
 		// $confirmpass =md5($confirmpass);
	$query1 ="SELECT * FROM user_master WHERE name='$uname'";
	
	$query=mysqli_query($dbhandle,$query1);
	
	if(mysqli_num_rows($query)>0){
		echo "Name already exists!";
	}
	
	else{

		$sql = "INSERT INTO user_master (name, password,role,active,created_date,updated_date) VALUES ('$uname','$pass','$role','$active',now(),now())";
		mysqli_query($dbhandle, $sql);
		header("location: login.php");
	}

}
?>


<html>

<body>
	
	<form action="loginform.php" method="POST">
		<table align="center">
			<tr>
				<th colspan="2"><h2 align="center">Register</h2></th>
			</tr>
			<tr>
				<td>Username</td>
				<td><input type="text" name="uname"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="pass"></td>
			</tr>
			<tr>
				<td>role</td>
				<td><input type="number" name="role"></td>
			</tr>
			<tr>
				<td>Active</td>
				<td><input type="number" name="active"></td>
			</tr>
			<tr>
				<td align="right" colspan="2"><input type="submit" value="Register"></td>
			</tr>
		</table>
	</form>
</body>
</html>