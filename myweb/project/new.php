<?php
include 'connection.php';
$q="select * from emp";
$res=mysqli_query($con,$q);
$c=mysqli_num_rows($res);
$c++;
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_FILES['file']['name'])){
	$filename=$_FILES['file']['name'];
	echo $filename;
	echo "<br>";
	$extension=end(explode(".",$filename));
	echo $extension;
	$newname=$c.".".$extension;
	echo $newname;
	$tmp_name=$_FILES['file']['tmp_name'];
	echo "<br>".$tmp_name;
	$location="image/".$newname;
	move_uploaded_file($tmp_name,$location);
	}
	
}
?>
<form action="new.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" value="upload">
</form>
