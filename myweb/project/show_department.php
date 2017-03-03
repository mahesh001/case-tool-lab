<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>show_dept</title>
<script>
function ba()
{
	window.history.back();
}
function show(str)
{
	if(str.length==0)
	{
		str=1;
	}
		var x=new XMLHttpRequest();
		x.onreadystatechange=function ()
		{
			if(x.readyState==4 && x.status==200)
			{
				document.getElementById('hint').innerHTML=x.responseText;
			}
		}
		x.open("GET","searchajax.php?q="+str,true);
		x.send();
	
}
</script>
</head>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="stylee.css"/>
<body class="body">
<?php
session_start();
if(!empty($_SESSION['emp_name']))
{
	
	
}
else
{
	header('Location:index.php');
}



?>
<div class="full">
<div class="header">
<div class="username"><?php if(!empty($_SESSION['emp_name']))
{
	echo "Welcome&nbsp;&nbsp;&nbsp;".$_SESSION['emp_name'];
	echo "</br>";echo "</br>";echo "</br>";echo "</br>";echo "</br>";
	echo "<input type='button' onclick='ba()' value='Back' class='button button-primary' style='padding:5px'>&nbsp;&nbsp;&nbsp;";
	echo "<a href='page.php' class='button button-primary' style='padding:5px'>Home</a>";
}
?>
</div>
<div class="logo">
</div>
<div class="change">
<p><a href="changepassword.php" class="anchor">Change password?</a><br />
<a href="sessiondestroy.php" class="anchor">Logout</a></p>
</div>
</div>
<div class="line">
<hr class="linee"/>
</div>
<div class="container" style="overflow:scroll;background-color:#000000;">
<p align="center" style="color:white; font-size:18px; margin-left:25%;"><b>DEPARTMENT DETAIL</b> <input type="text" id="txt1" onkeyup="show(this.value)" style="float:right;" placeholder="search"/></p>
<table class="log" cellpadding="10px" border="1" align="center" id="hint" bgcolor="#000000" ><tr><td><b>Dept_No</b></td><td><b>Dept_Name</b></td>
<td><b>Dept_loc</b></td>
<td colspan="2"><b>Option</b></td></tr>
<?php
	include('connection.php');
	$q="select * from department ";
	$res=mysqli_query($con,$q) or exit("Error in query");
	while($row=mysqli_fetch_array($res))
	{
		echo "<tr>";
		echo "<td align='justify'>".$row[0]."</td>";
		echo "<td align='justify'>".$row[1]."</td>";
		echo "<td align='justify'>".$row[2]."</td>";
		echo "<td align='justify'><a href='dept_detail.php?dept_number=$row[0]&dept_name=$row[1]&dept_loc=$row[2]&type=2' class='anchor'>Update</a></td>";
		echo "<td align='justify'><span style='cursor:pointer' class='anchor' onclick=f(".$row[0].")>Delete</span></td>";
		echo "</tr>";

}
?>
</table>
</div>
<div class="bline">
<hr class="linee"/>
</div>
<div class="footer">
<p>Design and created by <a href="" class="anchor" style="font-size:11px"><b>ABHINAV SHARMA</b></a></p></div>
</div>
</body>
</html>
<script>
function f(dept_number)
{
	
	val=confirm("Are You Sure");
	if(val==true)
	{
		var x=new XMLHttpRequest();
		x.onreadystatechange=function ()
		{
			
			if(x.readyState==4 && x.status==200)
			{
				
				document.getElementById('hint').innerHTML=x.responseText;
				document.getElementById('hint').className="color";
			}
		}
			x.open("GET","deptdelete.php?dept_number="+dept_number,true);
	       x.send();
	}
	else
	{
		
		
	}
	

}
</script>