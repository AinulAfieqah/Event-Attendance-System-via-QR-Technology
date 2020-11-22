<?php
//including the database connection file
include_once("db_connection.php");

session_start();

if(!$_SESSION['adminID'])
{

    header("Location: index.php");//redirect to login page to secure the welcome page without login access.
}

$adminID = $_SESSION['adminID'];
$dAdmin = mysqli_query($db_connect, "SELECT * FROM eventqrsystem.admin ad WHERE ad.adminID='$adminID'");

	/*if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM venue WHERE roomName ='$valueToSearch'";
		$venue = searchTable($query);
	}
	else
	{
		$query = "SELECT * FROM venue";
		$venue = searchTable($query);
	}
	
	function searchTable($query)
	{
		$mysqli = mysqli_connect('localhost','root','', 'event_attendance_qr');
		$searchResult=mysqli_query($mysqli, $query);
		return $searchResult;
	}*/

//Pagination
$adjacents = 3; // How many adjacent pages should be shown on each side?
$query = "SELECT COUNT(*) as num FROM eventqrsystem.venue";
$total_pages = mysqli_fetch_array(mysqli_query($db_connect, $query));
$total_pages = $total_pages["num"];			//$total_pages = $total_pages[num];//
$targetpage = "ad-managevenue.php"; 					//your file name  (the name of this file)//
$limit = 10; 								//how many items to show per page
$page = $_GET['page'];
if($page) 
	$start = ($page - 1) * $limit; 			//first item to display on this page
else
	$start = 0;								//if no page var is given, set start to 0
$sql = "SELECT * FROM eventqrsystem.venue LIMIT $start, $limit";
$result = mysqli_query($db_connect, $sql);
if ($page == 0) $page = 1;					//if no page var is given, default to 1.
$prev = $page - 1;							//previous page is page - 1
$next = $page + 1;							//next page is page + 1
$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;						//last page minus 1
/* 
	Now we apply our rules and draw the pagination object. 
	We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
if($lastpage > 1)
{	
	$pagination .= "<div class=\"pagination\">";
	
//previous button
	if ($page > 1) 
		$pagination.= "<a href=\"$targetpage?page=$prev\"><&minus;&minus; Previous</a>";
	else
		$pagination.= "<span class=\"disabled\"><&minus;&minus; Previous</span>";
		
//pages	
	if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
	{	
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
			if ($counter == $page)
				$pagination.= "<span class=\"current\">$counter</span>";
			else
				$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
		}
	}
	elseif($lastpage > 5 + ($adjacents * 2))	
	{
		if($page < 1 + ($adjacents * 2))		
		{
			for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
			$pagination.= "...";
			$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
			$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
		}
		
//in middle; hide some front and some back
		elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
		{
			$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
			$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
			$pagination.= "...";
			for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
			$pagination.= "...";
			$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
			$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
		}
		
//close to end; only hide early pages
		else
		{
			$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
			$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
			$pagination.= "...";
			for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
	}
	
//next button
	if ($page < $counter - 1) 
		$pagination.= "<a href=\"$targetpage?page=$next\">Next &minus;&minus;></a>";
	else
		$pagination.= "<span class=\"disabled\">Next &minus;&minus;></span>";
	$pagination.= "</div>\n";		
	}

//$select= "SELECT * FROM heasuratimran.students s JOIN heasuratimran.programmes p ON s.programmeid = p.programmeid LIMIT $start, $limit";
//$result = mysqli_query($db_connect, $select);
?>