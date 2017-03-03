<?php

if($_SERVER['REQUEST_METHOD']=='POST')
  {
    session_start();
    
        $_SESSION['username']=$_POST['username'];
    $username=$_POST['username'];

    $fullname=$_POST['fullname'];
        $password=$_POST['password'];

  $r= "select username from user where username='$username'";
    $con =new mysqli("localhost","root","","onlinestore");
  $q=mysqli_query($con,$r);
  $num= mysqli_num_rows($q);
  if($num==0){
  $q="Insert into user (fullname,username,password) values('$fullname','$username','$password')";
  mysqli_query($con,$q) or exit('Error in query');
       echo "<h3>Added..</h3>";
  }
  else
  {
    echo "user already exists";
    echo '<a href="login.html"><input type="button" name="login" value="Login"></a>';
    
    
  }
  
  }