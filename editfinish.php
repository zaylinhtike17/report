<?php
session_start();
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include("db_controller.php");

	$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$result = mysqli_query($conn, "SELECT * FROM finish_report WHERE uid=$uid");
	$row = mysqli_fetch_assoc($result);
	if(!empty($_POST["submit"])) {
	$id = $_SESSION['id'];
	$uid = $_GET['uid'];
	$date =$_POST['date'];
	$eplan =$_POST['eplan'];
	$sql = "UPDATE  finish_report set  user_id='$id',fdate='$date',work_done='$eplan' ,updated_date=now() WHERE uid=$uid";
	
mysqli_query($conn, $sql);
header("location: finishreport.php"); 
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
			<td><input type="number" name="userid" id="userid" hidden="hidden"><?php echo $row['uid']?></td>
		</tr>
		<tr>
			<td><label for="date">Choose Date</label></td>
			<td><input type="date" name="date" id="date" value="<?php echo $row['fdate']?>"></td>
		</tr>
		<tr>
			<td><label for="eplan">Finish Report</label></td>
			<td><textarea name="eplan" id="eplan" ><?php echo $row['work_done']?></textarea></td>
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