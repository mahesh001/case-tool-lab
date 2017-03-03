<?php
session_start();
include 'connection.php';
if(!empty($_SESSION['username']))
{
	$username=$_SESSION['username'];
	echo "Welcome ".$_SESSION['username'];
	echo "<br><br>";
	
		echo '<form method="post" action="view.php">
<input type="submit" name="profile" value="View Profile">
</form>';
	echo "<br><br>";
	echo '<form method="post" action="view.php">
<input type="submit" name="logout" value="Logout">
</form>';

}
else
{
	echo "<h2>Login first</h2>";
}

if($_SERVER['REQUEST_METHOD']=='POST')
{
	   if(!empty($_POST['logout']))
	  header('location:logout.php');
  if(!empty($_POST['profile']))
  {
	  $r="select * from user where username='$username'";
	$q=mysqli_query($con,$r);
	$num= mysqli_fetch_assoc($q);
	
	echo "your username is ".$num["username"];
	echo "<br>";
	echo "your password is ".$num["password"];
  }
}
?>
<style>
body{
	
	text-align:center;
}
</style>


