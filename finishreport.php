<?php
session_start();
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);
    
?>
<?php
include("db_controller.php");
$id=$_SESSION['id'];

 if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
       
         $num_results_on_page = 10;
        $offset = ($page-1) * $num_results_on_page;
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }


        $total_pages_sql = "SELECT COUNT(*) FROM finish_report WHERE user_id=$id";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_pages = mysqli_fetch_array($result)[0];
        $total_rows = ceil($total_pages / $num_results_on_page);
        $sql = "SELECT * FROM finish_report WHERE user_id=$id LIMIT $offset, $num_results_on_page";
        $rows=$offset+1;
        $res_data = mysqli_query($conn,$sql);
        mysqli_close($conn);




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
        
        <?php while($row = mysqli_fetch_array($res_data)):?>
          
          <tr>
            <td><?php echo $rows++;?></td>
            <td><?php echo $row['fdate'];?></td>
            <td><?php echo $row['work_done'];?></td> 
            <td>
              [<a href="edit.php?uid=<?php echo $row['uid']?>">Edit</a>][<a href="delete.php?uid=<?php echo $row['uid']?>"onClick="return confirm('are you sure you want to delete??');">Delete</a>]</td> 
            </tr>
          <?php endwhile;?>
        </tbody>
      </table>

   

    <?php if (ceil($total_pages / $num_results_on_page) > 0): ?>
      <ul class="pagination">
         <?php if ($page > 1): ?>
        <li class="prev"><a href="index.php?page=<?php echo $page-1 ?>">Prev</a></li>
        <?php endif; ?>
        <?php if ($page > 3): ?>
        <li class="start"><a href="index.php?page=1">1</a></li>
        <li class="dots">...</li>
        <?php endif; ?>

        <?php if ($page-2 > 0): ?><li class="page"><a href="index.php?page=<?php echo $page-2 ?>"><?php echo $page-2 ?></a></li><?php endif; ?>
        <?php if ($page-1 > 0): ?><li class="page"><a href="index.php?page=<?php echo $page-1 ?>"><?php echo $page-1 ?></a></li><?php endif; ?>

        <li class="currentpage"><a href="index.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

        <?php if ($page+1 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="index.php?page=<?php echo $page+1 ?>"><?php echo $page+1 ?></a></li><?php endif; ?>
        <?php if ($page+2 < ceil($total_pages / $num_results_on_page)+1): ?><li class="page"><a href="index.php?page=<?php echo $page+2 ?>"><?php echo $page+2 ?></a></li><?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)-2): ?>
        <li class="dots">...</li>
        <li class="end"><a href="index.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
        <?php endif; ?>

        <?php if ($page < ceil($total_pages / $num_results_on_page)): ?>
        <li class="next"><a href="index.php?page=<?php echo $page+1 ?>">Next</a></li>
        <?php endif; ?>
      </ul>
      <?php endif; ?>
      
    </div>
  </div>
</div>
</div>
</div> 

</body>
</html>