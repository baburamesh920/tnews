<?php

$id=$_GET['id'];
include("db_config.php");

session_start();
if($_SESSION['email']=="admin@gmail.com"){
	
	 
	$query=mysqli_query($con,"UPDATE `news` SET `approval_status`='1' WHERE id='$id' ");
	if($query)
	{
		echo "<script>alert('User News Approved Successfully');
		window.location= 'user_uploaded_news.php';
		</script>";

	}
}
else{
	$query=mysqli_query($con,"UPDATE `news` SET `approval_status`='1' WHERE id='$id' ");
	if($query)
	{
		echo "<script>alert('User News Approved Successfully');
		window.location= 'user_uploaded_news.php';
		</script>";

	}
}


?>