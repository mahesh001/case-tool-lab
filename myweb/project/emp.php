<style>
body{text-align:center;}
</style>

<?php
include 'connection.php';
session_start();

$q="select * from emp";
$res=mysqli_query($con,$q);
$c=mysqli_num_rows($res);
if(!empty($_SESSION['username']) && $_SESSION['username']=='admin')
{
	
$q="select dname from dept";
$arr=Array();
$count=0;$i=0;
$res=mysqli_query($con,$q) or exit('error in query');
while($row=mysqli_fetch_array($res))
{
	$arr[$count++]=$row[0];
}
echo '<h1>Add Employee Detail</h1>
<form action="emp.php" method="post" enctype="multipart/form-data">
<input type="text" name="name" placeholder="enter employee name"><br><br>
<input type="text" name="dob" placeholder="enter employee dob"><br><br>
<input type="text" name="doj" placeholder="enter employee doj"><br><br>';
echo '<input type="file" name="file" value="choose your picture"><br><br>';
echo '<select name="box">';
echo '<option value="0">Select Department ';
while($i<$count)
{
echo '<option value=';echo $i+1;echo '>';echo $arr[$i];
$i++;
}
echo '</select>';
echo '<br><br>';
echo '
<input type="submit" name="submit" value="ADD">
</form>';
if($_SERVER['REQUEST_METHOD']=='POST'){

	$empname=$_POST['name'];
	$dob=$_POST['dob'];
	$doj=$_POST['doj'];
	
	$box=$_POST['box'];
	
	$location="";
	if(!empty($_FILES['file']['name'])){
		$c++;
	$filename=$_FILES['file']['name'];
//	echo $filename;
	//echo "<br>";
	$extension=end(explode(".",$filename));
	//echo $extension;
	$newname=$c.".".$extension;
//	echo $newname;
	$tmp_name=$_FILES['file']['tmp_name'];
//	echo "<br>".$tmp_name;
	$location="image/".$newname;
	move_uploaded_file($tmp_name,$location);
	}
	
	
	
	$q="Insert into emp (empname,empdob,empdoj,deptname,imageurl) 
	values('$empname','$dob','$doj','$box','$location')";
	mysqli_query($con,$q) or exit('hello');
	echo "<h3>Added..</h3>";
}
}
else 
	echo "<h2>First Login as a Administrater</h2>";
?>

