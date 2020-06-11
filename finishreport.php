<?php
session_start();
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
include("db_controller.php");    
?>
<?php
$id=$_SESSION['id'];
$result_per_page = 10; 
$i=1;
$sql="SELECT * FROM finish_report WHERE user_id=$id";
$search_result=mysqli_query($conn,$sql);
$number_of_result=mysqli_num_rows($search_result);   
$number_of_pages = ceil($number_of_result/$result_per_page);
if(!isset($_GET['page'])){
	$page= 1;
}
else{
	$page =$_GET['page'];
}
$page_first_result =($page-1)*$result_per_page;
$sql = "SELECT * FROM finish_report WHERE user_id=$id LIMIT " . $page_first_result . ",". $result_per_page;
$search_result = mysqli_query($conn, $sql);
?>
<html>
<head>
	<title>PHP CRUD with Search and Pagination</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>
	<h2 align="center">Reporting system</h2>
	<div class="card">
		<div class="card-title">
			<h3 style="display: inline;">Plan Report Form</h3><br>
			<label for="uname" style="font-size: 20px; color: blue;"> Profile:</label>
			<label  for="username" style="font-size:20px; color: blue;"><?php echo $_SESSION['name']?></label>
			<a href="logout.php" class="new" style="text-align: center; float: right; margin-top: 5px;">LOG OUT</a>
			<hr>
			<div class="card-body">
				<div class="form-group">
					<div class="table-responsive" id="dynamic_content">

						<!-- Trigger the modal with a button -->
						<button type="button"  class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD NEW</button>

						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Finish Report</h4>
									</div>
									<div class="modal-body">

										<table>


											<form action="finish.php" method="post">
												<tr>
													<td><label for="id">User ID</label></td>
													<td><input type="number" name="id" id="id" hidden="hidden"><?php echo $_SESSION['id']?></td>
												</tr>
												<tr>
													<td><label for="date">Choose Date</label></td>
													<td><input type="date" name="date" id="date" required="required"></td>
												</tr>
												<tr>
													<td><label for="eplan">Final Report</label></td>
													<td><textarea name="eplan" id="eplan" required="required"></textarea></td>
												</tr>
												<tr>
													<td  colspan="2" align="center"><input type="submit" value="ADD Finish Report"></td>
												</tr>
											</form>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>

							</div>
						</div>



						<button class="btn btn-info" style="float: right; color:"><a href="index.php" class="new" style="display: inline; text-align: center;color: white; text-decoration: none;">Go To Plan Report</a></button><br>
					</form>
				</div> 
				<table cellpadding="10" cellspacing="1" border="2"  style="margin-top:20px;">
					<thead>
						<tr>
							<th><strong>#</strong></th>
							<th><strong>Date</strong></th>         
							<th><strong>Final Report</strong></th>
							<th><strong>Action</strong></th>

						</tr>
					</thead>
					<tbody>
					</tr>
					
					<?php while($row = mysqli_fetch_array($search_result)):?>
						
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $row['fdate'];?></td>
							<td><?php echo $row['work_done'];?></td>
							<th>[<a href="delete.php?id=<?php echo $row['id']?>"onClick="return confirm('are you sure you want to delete??');">Delete</a>]
								[<a href="edit.php?id=<?php echo $row['id']?>">Edit</a>]</th>
							</tr>
						<?php endwhile;?>
					</tbody>
				</table>
				<?php
				for($page=1;$page<=$number_of_pages;$page++)
				{
					echo '<a href ="index.php?page='. $page. '">'.$page. "</a>";
				}
				?>
				
			</div>
		</div>
	</div>
</div>
</div> 

</body>
</html>

