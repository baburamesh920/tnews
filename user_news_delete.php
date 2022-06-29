<?php

$id=$_GET['id'];
include("db_config.php");
session_start();
if($_SESSION['email']=="admin@gmail.com"){

$query=mysqli_query($con,"DELETE FROM `news` WHERE id='$id' ");
if($query)
{
	echo "<script>alert('User News Deleted Successfully');
	window.location= 'user_uploaded_news.php';
	</script>";

}
}




?>