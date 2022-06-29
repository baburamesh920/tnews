<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"UPDATE breaking_news SET reporter = '0' WHERE id='$id' ;");
if($query)
{
	echo "<script>alert('News Posted Successfully');
	window.location= 'breaking_news.php';
	</script>";

}
?>