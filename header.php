<?php
session_start();
$name =isset($_SESSION['name']);
$id =isset($_SESSION['id']);    
?>
<html>
<head>
  <title>PHP CRUD with Search and Pagination</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<h2 align="center">Reporting system</h2>
  <div class="conatiner">
        <h3 style="display: inline;">Plan Report Form</h3><br>
        <label class="label" for="uname" style="font-size: 20px; color: blue;"> Profile:</label>
        <span style="font-size: 25px; color: blue;text-align:left;"><?php echo $_SESSION['name']?></span>
        <a href="logout.php" class="new" style="text-align: center; float: right;font-size: 15px; margin:10px 50px 10px 5px;">LOG OUT</a>
        <hr style="background-color:black;height: 3px;">

      </div>
    </div>
  </div>
</div>    
</div>
</body>
</html>
<style type="text/css">
  .modal-body tr, td {
    padding: 3px;
  }
  h3{
    margin:10px 30px 10px 40px;
  }
  label{
    margin:10px 30px 10px 30px;
  }
</style>