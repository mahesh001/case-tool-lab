<!DOCTYPE html>
<style>
body{text-align:center;}
</style>
<?php
if(isset($_POST['username'],$_POST['password']))
{
include 'connection.php';
if($_SERVER['REQUEST_METHOD']=='POST')
  {
   session_start();
    
        $_SESSION['username']=$_POST['username'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $fullname=$_POST['fullname'];
    $mobno=$_POST['mobno'];
  $r= "select username from users where username='$username'";
  $q=mysqli_query($con,$r);
  $num= mysqli_num_rows($q);
 
 if($num==0){ ;
 $q="Insert into users (fullname,mobno,username,password) values('$fullname','$mobno','$username','$password')";
  mysqli_query($con,$q) or exit('Error in query');
      echo "<h1 style='color:red'>you are successfully registered.......</h1>";
         header('Refresh: 5; URL=http:login.html');
       
  }
  else
 {  echo"$num";
    echo "user already exists";
   echo '<a href="login.html"><input type="button" name="login" value="Login"></a>';
    
    
  }
  
  
 }
}
else
{
  echo"";
}
?>