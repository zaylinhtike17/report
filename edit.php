<?php
session_start();
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include("db_controller.php");

	$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$result = mysqli_query($conn, "SELECT * FROM plan_report WHERE uid=$uid");
	$row = mysqli_fetch_assoc($result);
	if(!empty($_POST["submit"])) {
	$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$date =$_POST['date'];
	$mplan =$_POST['mplan'];
	$eplan =$_POST['eplan'];
	$sql = "UPDATE  plan_report set  user_id='$id',ndate='$date', morning_plan='$mplan',evening_plan='$eplan' ,updated_date=now() WHERE uid=$uid";
	
mysqli_query($conn, $sql);
header("location: index.php"); 
}
?>
<table>

	<form action="" method="post">
		<tr>
			<td><label for="id">User ID</label></td>
			<td><input type="number" name="id" id="id" hidden="hidden"><?php echo $_SESSION['id']?></td>
		</tr>
		<tr>
			<td><label for="userid">ID</label></td>
			<td><input type="number" name="userid" id="userid" value="<?php echo $row['uid']?>"></td></td>
		</tr>
		<tr>
			<td><label for="date">Choose Date</label></td>
			<td><input type="date" name="date" id="date" value="<?php echo $row['ndate']?>"></td>
		</tr>
		<tr>
			<td><label for="mplan">Morning Plan</label></td>
			<td><textarea name="mplan" id="mplan" ><?php echo $row['morning_plan']?></textarea></td>
		</tr>

		<tr>
			<td><label for="eplan">Evening Plan</label></td>
			<td><textarea name="eplan" id="eplan" ><?php echo $row['evening_plan']?></textarea></td>
		</tr>
		<tr>
			<td  colspan="2" align="center"><input type="submit" name="submit" value="Update PLAN"></td>
		</tr>
	</form>
</table>
<style>
	form label{
		
		margin-top: 8px; 
		padding: 5px;
	}
</style>