<!DOCTYPE html>
<style>
body{text-align:center;}
</style>

<?php
include 'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST')
  {
    session_start();
    
        $_SESSION['username']=$_POST['username'];
    $username=$_POST['username'];
    $password=$_POST['password'];
  $r= "select username from user where username='$username'";
  $q=mysqli_query($con,$r);
  $num= mysqli_num_rows($q);
  if($num==0){
  $q="Insert into user (username,password) values('$username','$password')";
  mysqli_query($con,$q) or exit('Error in query');
       echo "<h3>Added..</h3>";
  }
  else
  {
    echo "user already exists";
    echo '<a href="login.php"><input type="button" name="login" value="Login"></a>';
    
    
  }
  
  }

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
    
    <img src="../img/logo.png">
  
    <h1>CREATE ACCOUNT</h1>
<form method="post" action="signup.php">
<input type="text" name="username" placeholder="enter your name"></input>
<input type="password" name="password" placeholder="enter password"></input>
<input type="submit" name="submit">
<hr>
<div style="text-align:center">
  <h3>copyright@2015 OnlineStore.com</h3>
</div>
</form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>