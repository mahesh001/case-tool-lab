
<head>

<style>
body{text-align:center;}
#a{
	text-align:left;
	margin-right:120px;
}
#c{
	text-align:left;
	margin-left:20px;
	height:100px;
	width:100px;
}
</style>
</head>

<?php
include 'connection.php';
session_start();

$empname="";
$empdept="";
$empdloc="";
$empdob1="";
$empdob2="";
$empdoj1="";
$empdoj2="";
if(!empty($_SESSION['username']) && $_SESSION['username']=='admin')
{
	
$q="select * from dept";
$arr=Array();
$dlocarr=Array();
$count=0;$i=0;
$res=mysqli_query($con,$q) or exit('error in query');
while($row=mysqli_fetch_array($res))
{
	$arr[$count]=$row[1];
	$dlocarr[$count++]=$row[2];
}

echo '<h1>Search For Employee</h1>
<form action="search1.php" method="post">';
echo '<input type="text" name="name" placeholder="enter employee name"><br><br>';
echo '<select name="dname">';
echo '<option value="0">Select Department Name';
while($i<$count)
{
echo '<option value=';echo $i+1;echo '>';echo $arr[$i];
$i++;
}
echo '</select>';
echo '<br><br>';

$i=0;

echo '<select name="dloc">';
echo '<option value="0">Select Department Location ';
while($i<$count)
{
echo '<option value=';echo $i+1;echo '>';echo $dlocarr[$i];
$i++;
}
echo '</select>';
echo '<br><br>';

echo '<input id="a" type="text" name="date1" placeholder="from date of birth">';
echo '<input id="b" type="text" name="date2" placeholder="to date of birth"><br><br>';
echo '<input id="a" type="text" name="date3" placeholder="from date of joining">';
echo '<input id="b" type="text" name="date4" placeholder="to date of joining"><br><br>';
echo '<input type="submit" value="search for employee">';
echo '</form>';


}
else
echo '<h2>Login as A administrator</h2>';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$empname=$_POST['name'];
	if(!empty($_POST['dname']))
	{
	$empdept=$_POST['dname'];
	}
if(!empty($_POST['dloc']))
	$empdloc=$dlocarr[$_POST['dloc']-1];
	$empdob1=$_POST['date1'];
	$empdob2=$_POST['date2'];
	$empdoj1=$_POST['date3'];
	$empdoj2=$_POST['date4'];
	
	$q="select * from emp where ";
$qarr[]=Array();
$cc=0;
	if(!empty($empname)){
		$qarr[$cc++]="empname='$empname'";
	}
	if(!empty($empdept)){
		$qarr[$cc++]="deptname='$empdept'";
	}
	
	
	if(!empty($empdob1)  && !empty($empdob2)){
		$qarr[$cc++]="empdob>='$empdob1' && '$empdob2'>=empdob";
	}
	
	
	if(!empty($empdoj1)  && !empty($empdoj2)){
		
		$qarr[$cc++]="empdoj>='$empdoj1' && '$empdoj2'>=empdoj";
	}
	
	if($cc>0){
		$q=$q.$qarr[0];
	}
	for($i=1;$i<$cc;$i++){
		$q.=" && ";
		$q.=$qarr[$i];
	}
	
	$res=mysqli_query($con,$q)or exit('error in query');
	
	while($row=mysqli_fetch_array($res)){
	echo "<hr>";
	echo "<hr>";
	echo "<hr>";
	echo "<hr>";
	echo "<hr>";
	echo '<img src=';echo $row[5];echo' id="c">.<br>';	
	echo "id of employee is ".$row[0]."<br>";
	echo "name of employee is ".$row[1]."<br>";
    echo "dob of employee is    ".$row[2]."<br>";
	echo "doj of employee is   ".$row[3]."<br>";
	echo "department name of employee is   ".$arr[$row[4]-1]."<br>";
	
	}
}
?>