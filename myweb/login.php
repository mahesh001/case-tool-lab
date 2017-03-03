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
		$_SESSION['password']=$_POST['password'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$type;

         $r="select username,password from users where username='".$username."' and password='".$password."'";
		
		 $q=mysqli_query($con,$r);
	    $num= mysqli_num_rows($q);
		$row= mysqli_fetch_assoc($q);
	     if($num==1 )
	  {
		
		header('location:index2.html');
		echo"<h1>user not exist<h1>";
	    }
	   else if($num==1 && $username=='admin' && $row["type"]==1){
		header('location:index2.html');
	    }
	    else
	    {
		echo "this username/password doesn't exist please signup";

		
	     echo '<a href="login.html"><input type="submit" name="signup" value="signup"></a>';
	
	     }
    }

	   else
		echo"username  not exist or username/password are wrong";
}
?>