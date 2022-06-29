<?php 
if(isset($_POST['gcm_id']))
{
    include("db_config.php");
$gcm=mysqli_real_escape_string($con,$_POST['gcm_id']);
//$banner=$_FILES['banner']['name'];

    $sql=mysqli_query($con,"INSERT INTO `notifications`(`gcm_id`) VALUES ('$gcm')");
    if($sql)
    {
       $response = array( 'status' => 'success');	
		print json_encode($response);
    }
    else{

    	$response = array( 'status' => 'failed');	
		print json_encode($response);
    }


}

?>