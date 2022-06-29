<?php

$id=$_GET['id'];
include("db_config.php");

session_start();
if($_SESSION['email']=="admin@gmail.com"){
	$query=mysqli_query($con,"DELETE FROM `news` WHERE id='$id' ");
	if($query)
	{
		echo "<script>alert('News Deleted Successfully');
		window.location= 'news.php';
		</script>";

	}
}
else{
	$query=mysqli_query($con,"DELETE FROM `news` WHERE id='$id' and reporter ='1'");
	if($query)
	{
		echo "<script>alert('Reporter News Deleted Successfully');
		window.location= 'reporter_news.php';
		</script>";

	}
}


?>