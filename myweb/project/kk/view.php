	<?php 
$page_num=1;
$page_rows=10;
session_start();


if(isset($_POST['area']))
{
	$area=$_POST['area'];
	$_SESSION['area']=$area;
}
if(isset($_SESSION['area']))
{
	$area=$_SESSION['area'];
}
if(isset($_GET['pn'])){
	$page_num=preg_replace('#[^0-9]#','', $_GET['pn']);
	include('index.php');
//	$area= $_SESSION['area'];
	$category=$_SESSION['category'];
	$city= $_SESSION['city'];

}
else
{
//	$area= $_POST["area"];

	if(isset($_GET['category'])) // when the hyperlink of category is clicked
	{
		$category= $_GET["category"];
		$_SESSION['category']=$_GET["category"];
	}
	else
	{
		$category= $_POST["category"];
		$_SESSION['category']=$_POST["category"];
	}
	
	if(isset($_SESSION['city']))
	{
		$city= $_SESSION["city"];
	}
	if(isset($_POST['city']))
	{
		$_SESSION['city']=$_POST['city'];
		$city= $_SESSION["city"];
	}
//	$_SESSION['area']=$_POST["area"];	
	include('index.php');
}


$limit=($page_num-1)*$page_rows;
if($page_num<1)
{
	$page_num=1;
}
include('db.php');

if(!(empty($city)))
{

	$sql="select * from city where city='".$city."'";
	if ($result=mysqli_query($con,$sql))
  	{
	  // Fetch one and one row
	  while ($row=mysqli_fetch_row($result))
    		{
	    		$cityID = $row[0];
	    	}
	mysqli_free_result($result);
	}
	mysqli_close($con);
	$whc= " cityid=".$cityID." and ";
}
else
{
	$whc='';
}

include('db.php');
if(!(empty($area)))
{
	$sql="select * from area where AreaName='".$area."'";
	if ($result=mysqli_query($con,$sql))
  	{
	  // Fetch one and one row
	  while ($row=mysqli_fetch_row($result))
    		{
	    		$areaID = $row[0];
	    	}
	mysqli_free_result($result);
	}
	mysqli_close($con);
	
	$wh=$whc." areaID=".$areaID." and ";

}
else
{
	$wh=$whc;
}
include('db.php');
if(!(empty($category)))
{
	$sql="select * from category where categoryname='".$category."'";
	if ($result=mysqli_query($con,$sql))
  	{
	  // Fetch one and one row
	  while ($row=mysqli_fetch_row($result))
    		{
    			$categoryID = $row[0];
	    }
		mysqli_free_result($result);
	}
	mysqli_close($con);
	if (isset($_GET['catid']))
	{
		$categoryID=$_GET['catid'];
	}
	$wh1=" categoryid = ".$categoryID;
}
else
{
	$wh1='';
	
}
$wh=$wh.$wh1;

include('db.php');
$query="call p_pageList($limit,$page_rows,'*','listing','$wh','title',@id); Select @id as ID;";


if (mysqli_multi_query($con, $query)) {
		echo "<table  border = 4>";

    do {
        /* store first result set */
        if ($result = mysqli_store_result($con)) {
            while ($row = mysqli_fetch_row($result)) {
                 $field_cnt = $result->field_count;
 			$row_cnt=$result->num_rows;
				if($field_cnt>1)
				{
				 	$i=0;
					echo "<tr>";
					echo "<td>".$row[1]."<br />";
/*					while ($i<$field_cnt)
					{
						echo "<td>".$row[$i]."<br />";
						$i++;
					}
*/
				}
				else
				{
					$total_rows=$row[0];
				}

            }
            mysqli_free_result($result);
        }
        /* print divider */
        if (mysqli_more_results($con)) {
        }
		else
		{
			echo "</table>";
			/*$i=1;
			$total_button=ceil($total_rows/10);*/

//starting
			$last=ceil($total_rows/$page_rows);
			if($last<1)
			{
				$last=1;
			}
			
			if($page_num<1)
			{
				$page_num=1;
			}
			else if ($page_num>$last)
			{
				$page_num=$last;
			}
			$textline1="Page <b>".$page_num."</b> of <b>".$last."</b>";


			$paginationCtrls='';
			if($last !=1)
			{
				if($page_num > 1)	
				{
					$previous=$page_num-1;
					$paginationCtrls.="<a href='view.php?pn=".$previous."'>Previous</a> &nbsp";
					for($i=$page_num-4; $i< $page_num; $i++)	
					{
						if($i>0)
						{
							$paginationCtrls.="<a href='view.php?pn=".$i."'>".$i."</a> &nbsp";
						}
					}

				}
				if($page_num==1)
				{
					$val=$page_num+9;
				}
				else
				{
					$val=$page_num+4;
				}
				$paginationCtrls.=$page_num." &nbsp;";
				for($i=$page_num+1; $i<=$last; $i++)
				{
					$paginationCtrls.="<a href='view.php?pn=".$i."'>".$i."</a> &nbsp";
					if($i>= $val){
						break;
					}
				}
				if($page_num != $last)
				{
						$next=$page_num+1;
						$paginationCtrls.="<a href='view.php?pn=".$next."'>Next</a> &nbsp";
				}
				echo $paginationCtrls;
			}

//ending
/*
			while($i<=$total_button)
			{
				echo "<a href='view.php?pn=".$i."'>".$i."</a> ";
				$i++;
			}*/
		
			exit();
		}
    }while(mysqli_next_result($con));
}
?>