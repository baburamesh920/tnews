<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"UPDATE news SET status = 'posted' WHERE id='$id' ;");
if($query)
{
	echo "<script>alert('News Posted Successfully');
	window.location= 'post_reporter_news.php';
	</script>";


	

}
?>