<?php

$id=$_GET['id'];
include("db_config.php");


$query=mysqli_query($con,"UPDATE news SET user = '0' WHERE id='$id' ;");
if($query)
{
	echo "<script>alert('News Posted Successfully');
	window.location= 'news.php';
	</script>";


	

}
?>