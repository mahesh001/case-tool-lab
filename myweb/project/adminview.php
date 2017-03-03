<style>
body{
	
	text-align:center;
}
</style>
<?php
session_start();
if(!empty($_SESSION['username']) &&$_SESSION['username']=='admin'){

echo "<h1>Hello Admin</h1>";

echo '
<form action="adminview.php" method="post">

<input type="submit" value="add employee"  name="emp">
<input type="submit" value="add department"  name="dept"><br><br>
<input type="submit" value="search employee"  name="search"><br><br>
<input type="submit" name="logout" value="Logout">
</form>';
}
else
echo "<h2>Login As Admin</h2>";
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_POST['emp']))
		header('location:emp.php');
	else if(!empty($_POST['dept']))
		header('location:dept.php');
	if(!empty($_POST['logout']))
	  header('location:logout.php');
  if(!empty($_POST['search']))
	  header('location:search1.php');
}
?>
