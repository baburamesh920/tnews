<?php

$id=$_GET['id'];
include("db_config.php");

$query=mysqli_query($con,"DELETE FROM `category_type` WHERE id='$id' ");

if($query)
{
	echo "<script>alert('Category Type Deleted Successfully');
	window.location= 'category_types.php';
	</script>";
}else {
        echo "<script>alert('Cannot delete category type as there are related news');
        window.location= 'category_types.php';
        </script>";

}
?>
