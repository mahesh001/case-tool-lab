
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
<form action="search.php" method="post">';

echo '<select name="type">
<option value="0" selected>Search Type
<option value="1" >by name
<option value="2" >by department name
<option value="3" >by department location
<option value="4" >by dob
<option value="5" >by doj
</select><br><br>
';

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
echo '

</form>
';
}
else
echo '<h2>Login as A administrator</h2>';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$choice=$_POST['type'];
	if($choice==1){
if(!empty($_POST['name'])){
$name=$_POST['name'];		
$q="select * from emp where empname='$name'";
$res=mysqli_query($con,$q) or exit('error in query');
     
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
else
	echo '<h3>fill neccessary information first</h3>';
	}
	
	
	
	if($choice==2){
		$dno=$_POST['dname'];
		if(!empty($dno)){
		$q="select * from emp where deptname='$dno'";
$res=mysqli_query($con,$q) or exit('error in query');

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
	else
		echo '<h3>fill neccessary information first</h3>';
	}
	
	
	if($choice==3){
		$dloc=$_POST['dloc'];
		if(!empty($dloc)){
		$q="select * from dept where dno=$dloc";
		$res=mysqli_query($con,$q);
		$row=mysqli_fetch_array($res);
		$dno=$row[0];
	
				$q="select * from emp where deptname='$dno'";
         $res=mysqli_query($con,$q) or exit('error in query');
		 
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
		else
			echo '<h3>fill neccessary information first</h3>';
	}
	
	
	
	if($choice==4){
		 $date1=$_POST['date1'];
		 $date2=$_POST['date2'];
		 if(!empty($date1) && !empty($date2)){
		 $q="select * from emp where empdob>='$date1' && '$date2'>=empdob";
		 $res=mysqli_query($con,$q) or exit('error in query');
		
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
	else
		echo '<h3>fill neccessary information first</h3>';
	}
	
	if($choice==5){
		$date1=$_POST['date3'];
		 $date2=$_POST['date4'];
		  if(!empty($date1) && !empty($date2)){
		 $q="select * from emp where empdoj>='$date1' && '$date2'>=empdoj";
		 $res=mysqli_query($con,$q) or exit('error in query');
	
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
	else
		echo '<h3>fill neccessary information first</h3>';
	}
}



?>