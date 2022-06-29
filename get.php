<?php
$id=$_POST['id'];

//echo $id;

include("db_config.php");

   if($id==''){
	   
    $sql=mysqli_query($con,"SELECT * FROM category_type");
   }
   else{
	    $sql=mysqli_query($con,"SELECT * FROM category_type where language='$id'");
   }
	?>
	<option value="">Select Category Type</option>
    <?php
	while($row=mysqli_fetch_assoc($sql))
    {?>


		
                      <option value=<?php echo $row['id']; ?> ><?php echo $row['category_type']; ?></option>
    <?php
    
	}

?>