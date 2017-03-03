<?php
session_start();
if(!empty($_SESSION['username']))	
{

echo "<h2>logout successful ".$_SESSION['username']."</h2>";
unset($_SESSION['username']);
}
else
	echo "<h2>No user is online</h2>";
?>


<style>
body{
	
	text-align:center;
}
</style>