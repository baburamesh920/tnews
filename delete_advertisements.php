<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"DELETE FROM `advertisements` WHERE id='$id' ");
if($query)
{
	echo "<script>alert('Category Type Deleted Successfully');
	window.location= 'view_advertisements.php';
	</script>";


	

}
?>