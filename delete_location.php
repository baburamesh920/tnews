<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"DELETE FROM `news_location` WHERE `news_location`.`id` = $id");
if($query)
{
	echo "<script>alert('location Deleted Successfully');
	window.location= 'location.php';
	</script>";


	

}
?>