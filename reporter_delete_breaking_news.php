<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"DELETE FROM `breaking_news` WHERE id='$id' ");
if($query)
{
	echo "<script>alert('Breaking News Deleted Successfully');
	window.location= 'reporter_breaking_news.php';
	</script>";


	

}
?>
