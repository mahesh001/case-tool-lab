

<?php

if(isset($_POST))
  {
    session_start();
    
        $_SESSION['username']=$_POST['username'];
        $_SESSION['password']=$_POST['password'];
        
        $_SESSION['fname']=$_POST['fname'];
    $username=$_POST['username'];

    $fname=$_POST['fname'];
   $password=$_POST['password'];

    $con =new mysqli("localhost","root","","onlinestore");
  $r= "select username from users where username='$username'";
  $q=mysqli_query($con,$r);
  $num= mysqli_num_rows($q);
  if($num==0){
  $q="Insert into user (username,password,fullname) values('".$username."','".$password."','".$fname."')";
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
