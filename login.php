<style type="text/css">
     table {  
      background:#8FC283;  
      margin-top:150px;  
      border-radius:5px;  
}
th{
      text-align: right;
}
h3{
      text-align:center;
}
</style>
<table cellpadding="5" cellspacing="10" align="center">
      <h3>Login</h3>
      <form method="post" action="validate.php">
            <tr><th>Name</th>
                  <td><input type="text" name="name" id="name"></td>
            </tr>
            <tr><th>Password</th>
                  <td><input type="password" name="password" id="pass"></td>
            </tr>
            <tr><td colspan="2" align="center"><input type="checkbox" name="remember" value="1">Remember Me</td></tr>
            <tr><td colspan="2" align="right"><input type="submit" name="login" value="Login"></td></tr>
      </form>
</table>
<?php
if(isset($_COOKIE['name']) and isset($_COOKIE['pass'])){
      $name=$_COOKIE['name'];
      $pass=$_COOKIE['pass'];
      echo "<script>
      document.getElementById('name').value='$name';
      document.getElementById('pass').value='$pass';

      </script>";
}
?>