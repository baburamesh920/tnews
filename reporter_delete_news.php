<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"DELETE FROM `news` WHERE id='$id' ");
if($query)
{
	echo "<script>alert('News Deleted Successfully');
	window.location= 'reporter_news.php';
	</script>";


	

}
?>