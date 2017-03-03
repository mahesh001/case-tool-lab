<?php
include 'connection.php';
session_start();
if(!empty($_SESSION['username']) && $_SESSION['username']=='admin'){
echo '

<h1>Add Department Detail</h1>
<form action="dept.php" method="post">
<input type="text" name="dname" placeholder="enter department name"><br><br>
<input type="text" name="dloc" placeholder="enter department location"><br><br>
<input type="submit" name="submit" value="ADD">
</form>';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$dname=$_POST['dname'];
	$dloc=$_POST['dloc'];
	
	$q="Insert into dept (dname,dloc) values('$dname','$dloc')";
	mysqli_query($con,$q) or exit('hello');
	echo "<h3>Added..</h3>";
}
}
else
		echo "<h2>First Login as a Administrator</h2>";
?>
<style>
body{text-align:center;}
</style>
