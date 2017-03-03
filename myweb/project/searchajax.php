<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search ajax</title>
</head>

<body>
<?php
if(!empty($_GET['q']))
{
	$q=$_GET['q'];
	include('connection.php');
	if($q==1)
	{
		$q="select * from department";
		
	}
	else
	{
	$q="select * from department where Dept_Name like '$q%' order by Dept_name asc";
	}
	$res=mysqli_query($con,$q)or exit("Error in query");
	$count=mysqli_num_rows($res);
	if($count>0)
	{
		while($row=mysqli_fetch_array($res))
		{
		  echo "<tr>";
		echo "<td align='justify'>".$row[0]."</td>";
		echo "<td align='justify'>".$row[1]."</td>";
		echo "<td align='justify'>".$row[2]."</td>";
		echo "<td align='justify'>
		 <a href='dept_detail.php?dept_number=$row[0]&dept_name=$row[1]&dept_loc=$row[2]&type=2' 
		       class='anchor'>Update</a></td>";
		echo "<td align='justify'><span style='cursor:pointer' class='anchor' onclick=f(".$row[0].")>Delete</span></td>";
		echo "</tr>";
		}
	}
	else
	{
		echo "<p style='color:red;font-size:35px;'>No Found</p>";
}
}
?>
</body>
</html>